<?php
require_once("../configs/db_config.php");
require_once("../configs/app_config.php");

header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH',"OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}



require_once("../models/model.php");

//include all helpers
foreach (glob("../helpers/*_helper.php") as $filename)
{
    include $filename;
}

//include all models
$modelRootDir="../models";
foreach (glob($modelRootDir."/*.model.php") as $filename)
{
    require_once $filename;
}


$model_dirs = glob($modelRootDir.'/*' , GLOB_ONLYDIR);
foreach($model_dirs as $dir){
    foreach (glob("{$dir}/*.model.php") as $filename)
    {   
        include_once $filename;
    }
}

//include apis

$folder="../api";
$directories = glob($folder.'/*' , GLOB_ONLYDIR);
foreach($directories as $dir){
    foreach (glob("{$dir}/*_api.php") as $filename)
    {   
        include_once $filename;
    }
}

foreach (glob("{$folder}/*_api.php") as $filename)
{   
    include_once $filename;
}


//include all models
$libraryRootDir="../libraries";
foreach (glob($libraryRootDir."/*_library.php") as $filename)
{
    require_once $filename;
}



/*
if(isset($_GET["method"])){ 

     $method=$_GET["method"];    
     if(function_exists($method)){
      $params=array_values($_POST);   
      call_user_func_array($method,$params);
     }else{
       echo "Method is not exists";
     }
}
*/

 
//------Procedural api-------//
/*
if(isset($_GET["method"]) && empty($_GET["class"])){ 

     $method=$_GET["method"];    
     $res_method = $_SERVER['REQUEST_METHOD'];
     

     if(function_exists($method)){
       
        if($res_method=="POST"){

          //$params=array_values($_POST); 
          $params=$_POST;

        //   $jsonRequest=file_get_contents("php://input");
        //   $params=json_decode($jsonRequest,true); 

        //   parse_str($params);

        }else if($res_method=="GET"){ 
          //$params=array_values($_GET); 
          $params=$_GET;   
          
          

        }else if($res_method=="PUT"){
          _parsePut();
          //parse_str(file_get_contents("php://input"),$_PUT); 
          
         // $params=array_values($_PUT);         
          $params=$_PUT; 

        }else if($res_method=="DELETE"){
          _parseDelete();
          //parse_str(file_get_contents("php://input"),$_DELETE);      
          
         // $params=array_values($_DELETE);    
          $params=$_DELETE; 
        }else if($res_method=="PATCH"){
          //parse_str(file_get_contents("php://input"),$_DELETE);      
          _parsePatch();
         
          $params=$_PATCH; 
        }

         call_user_func_array($method,[$params,$_FILES]);
         //call_user_func_array(array($obj,$method), explode(',',$params));
     }else{
       echo "function is not exists";
     }

}
*/
//----------Object Oriented API---------//

if(isset($_GET["class"])){
  $class=$_GET["class"]."Api";
    
  if(class_exists($class)){

      if(!isset($_GET["method"]))
      {
        $method="index";
      }else{
        $method=$_GET["method"];
      }      

      $obj=new $class();     
      $method=$_GET["method"];
      $res_method = $_SERVER['REQUEST_METHOD'];
      


      $params=[];
      if(method_exists($obj,$method)){
       
        if($res_method=="POST"){
          
          if(!empty($_POST)){
            $params=$_POST;            
          }else{
            $jsonRequest=file_get_contents("php://input");
            $params=json_decode($jsonRequest,true);        
            if($params==null) { 
                http_response_code(400); // Bad Request
               echo "Invalid JSON data";
            }  
          }  
           

        }else if($res_method=="GET"){ 
         
          //$query_string=$_SERVER['QUERY_STRING'];
                            
          //-----json---
          $jsonRequest=file_get_contents("php://input");
          $params=json_decode($jsonRequest,true); 

          //--querystring---
          if($params==null){
            $params=$_GET;
          }
          
          //---Body Data---
          if(count($params)==2) {         
           _parseGet();              
           $params=$_GET; 
           if($params==null){            
                http_response_code(400); // Bad Request
                echo "Invalid JSON data";
            }           
          }

        }else if($res_method=="PUT"){
                    
          $jsonRequest=file_get_contents("php://input");
          $params=json_decode($jsonRequest,true);          
          if($params==null) {         
           _parsePut();              
           $params=$_PUT; 
           if($params==null){            
                http_response_code(400); // Bad Request
                echo "Invalid JSON data";
            }
           
          }

      

        }else if($res_method=="DELETE"){

            $jsonRequest=file_get_contents("php://input");
            $params=json_decode($jsonRequest,true);          
            if($params==null) { 
                _parseDelete();        
                $params=$_DELETE; 
                if($params==null){            
                    http_response_code(400); // Bad Request
                    echo "Invalid JSON data";
                }
            } 

        }else if($res_method=="PATCH"){

            $jsonRequest=file_get_contents("php://input");
            $params=json_decode($jsonRequest,true);          
            if($params==null) { 
                _parsePatch();           
                $params=$_PATCH; 
                if($params==null){            
                    http_response_code(400); // Bad Request
                    echo "Invalid JSON data";
                }
            } 
            
        }
         if(isset($_FILES)){
          $params["file"]=$_FILES;
         }
         //call_user_func_array($method,[$params,$_FILES]);
         call_user_func_array(array($obj,$method),[$params,$_FILES]);
     }else{
       //echo "Method $method is not exists";
       if(isset($_FILES)){
        $params["file"]=$_FILES;
       }
       call_user_func_array(array($obj,"index"),[$params,$_FILES]);
     } 
      

  }else{
     echo $class." class not exits.";
  }
    


}else{
  echo "Default Class";
}


function _parseGet()
{
    global $_GET;

    /* PUT data comes in on the stdin stream */
    $putdata = fopen("php://input", "r");

    

    $raw_data = '';

    /* Read the data 1 KB at a time
       and write to the file */
    while ($chunk = fread($putdata, 1024))
        $raw_data .= $chunk;

    /* Close the streams */
    fclose($putdata);

    // Fetch content and determine boundary
    $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

    if(empty($boundary)){
        parse_str($raw_data,$data);
        $GLOBALS['_GET'] = $data;
        return;
    }

    // Fetch each part
    $parts = array_slice(explode($boundary, $raw_data), 1);
    $data = array();

    foreach ($parts as $part) {
        // If this is the last part, break
        if ($part == "--\r\n") break;

        // Separate content from headers
        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        // Parse the headers list
        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
            list($name, $value) = explode(':', $header);
            $headers[strtolower($name)] = ltrim($value, ' ');
        }

        // Parse the Content-Disposition to get the field name, etc.
        if (isset($headers['content-disposition'])) {
            $filename = null;
            $tmp_name = null;
            preg_match('/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
                $headers['content-disposition'],
                $matches
            );
            list(, $type, $name) = $matches;

            //Parse File
            if( isset($matches[4]) )
            {
                //if labeled the same as previous, skip
                if( isset( $_FILES[ $matches[ 2 ] ] ) )
                {
                    continue;
                }

                //get filename
                $filename = $matches[4];

                //get tmp name
                $filename_parts = pathinfo( $filename );
                $tmp_name = tempnam( ini_get('upload_tmp_dir'), $filename_parts['filename']);

                //populate $_FILES with information, size may be off in multibyte situation
                $_FILES[ $matches[ 2 ] ] = array(
                    'error'=>0,
                    'name'=>$filename,
                    'tmp_name'=>$tmp_name,
                    'size'=>strlen( $body ),
                    'type'=>$value
                );

                //place in temporary directory
                file_put_contents($tmp_name, $body);
            }
            //Parse Field
            else
            {
                $data[$name] = substr($body, 0, strlen($body) - 2);
            }
        }

    }
    $GLOBALS['_GET'] = $data;
    return;
}

function _parsePut()
{
    global $_PUT;

    /* PUT data comes in on the stdin stream */
    $putdata = fopen("php://input", "r");

    

    $raw_data = '';

    /* Read the data 1 KB at a time
       and write to the file */
    while ($chunk = fread($putdata, 1024))
        $raw_data .= $chunk;

    /* Close the streams */
    fclose($putdata);

    // Fetch content and determine boundary
    $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

    if(empty($boundary)){
        parse_str($raw_data,$data);
        $GLOBALS['_PUT'] = $data;
        return;
    }

    // Fetch each part
    $parts = array_slice(explode($boundary, $raw_data), 1);
    $data = array();

    foreach ($parts as $part) {
        // If this is the last part, break
        if ($part == "--\r\n") break;

        // Separate content from headers
        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        // Parse the headers list
        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
            list($name, $value) = explode(':', $header);
            $headers[strtolower($name)] = ltrim($value, ' ');
        }

        // Parse the Content-Disposition to get the field name, etc.
        if (isset($headers['content-disposition'])) {
            $filename = null;
            $tmp_name = null;
            preg_match('/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
                $headers['content-disposition'],
                $matches
            );
            list(, $type, $name) = $matches;

            //Parse File
            if( isset($matches[4]) )
            {
                //if labeled the same as previous, skip
                if( isset( $_FILES[ $matches[ 2 ] ] ) )
                {
                    continue;
                }

                //get filename
                $filename = $matches[4];

                //get tmp name
                $filename_parts = pathinfo( $filename );
                $tmp_name = tempnam( ini_get('upload_tmp_dir'), $filename_parts['filename']);

                //populate $_FILES with information, size may be off in multibyte situation
                $_FILES[ $matches[ 2 ] ] = array(
                    'error'=>0,
                    'name'=>$filename,
                    'tmp_name'=>$tmp_name,
                    'size'=>strlen( $body ),
                    'type'=>$value
                );

                //place in temporary directory
                file_put_contents($tmp_name, $body);
            }
            //Parse Field
            else
            {
                $data[$name] = substr($body, 0, strlen($body) - 2);
            }
        }

    }
    $GLOBALS['_PUT'] = $data;
    return;
}

function _parsePatch()
{
    global $_PATCH;

    /* PUT data comes in on the stdin stream */
    $putdata = fopen("php://input", "r");

    

    $raw_data = '';

    /* Read the data 1 KB at a time
       and write to the file */
    while ($chunk = fread($putdata, 1024))
        $raw_data .= $chunk;

    /* Close the streams */
    fclose($putdata);

    // Fetch content and determine boundary
    $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

    if(empty($boundary)){
        parse_str($raw_data,$data);
        $GLOBALS['_PATCH'] = $data;
        return;
    }

    // Fetch each part
    $parts = array_slice(explode($boundary, $raw_data), 1);
    $data = array();

    foreach ($parts as $part) {
        // If this is the last part, break
        if ($part == "--\r\n") break;

        // Separate content from headers
        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        // Parse the headers list
        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
            list($name, $value) = explode(':', $header);
            $headers[strtolower($name)] = ltrim($value, ' ');
        }

        // Parse the Content-Disposition to get the field name, etc.
        if (isset($headers['content-disposition'])) {
            $filename = null;
            $tmp_name = null;
            preg_match('/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
                $headers['content-disposition'],
                $matches
            );
            list(, $type, $name) = $matches;

            //Parse File
            if( isset($matches[4]) )
            {
                //if labeled the same as previous, skip
                if( isset( $_FILES[ $matches[ 2 ] ] ) )
                {
                    continue;
                }

                //get filename
                $filename = $matches[4];

                //get tmp name
                $filename_parts = pathinfo( $filename );
                $tmp_name = tempnam( ini_get('upload_tmp_dir'), $filename_parts['filename']);

                //populate $_FILES with information, size may be off in multibyte situation
                $_FILES[ $matches[ 2 ] ] = array(
                    'error'=>0,
                    'name'=>$filename,
                    'tmp_name'=>$tmp_name,
                    'size'=>strlen( $body ),
                    'type'=>$value
                );

                //place in temporary directory
                file_put_contents($tmp_name, $body);
            }
            //Parse Field
            else
            {
                $data[$name] = substr($body, 0, strlen($body) - 2);
            }
        }

    }
    $GLOBALS['_PATCH'] = $data;
    return;
}


function _parseDelete()
{
    global $_DELETE;
    /* PUT data comes in on the stdin stream */
    $putdata = fopen("php://input", "r");    

    $raw_data = '';

    /* Read the data 1 KB at a time
       and write to the file */
    while ($chunk = fread($putdata, 1024))
        $raw_data .= $chunk;

    /* Close the streams */
    fclose($putdata);

    // Fetch content and determine boundary
    $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

    if(empty($boundary)){
        parse_str($raw_data,$data);
        $GLOBALS['_DELETE'] = $data;
        return;
    }

    // Fetch each part
    $parts = array_slice(explode($boundary, $raw_data), 1);
    $data = array();

    foreach ($parts as $part) {
        // If this is the last part, break
        if ($part == "--\r\n") break;

        // Separate content from headers
        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        // Parse the headers list
        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
            list($name, $value) = explode(':', $header);
            $headers[strtolower($name)] = ltrim($value, ' ');
        }

        // Parse the Content-Disposition to get the field name, etc.
        if (isset($headers['content-disposition'])) {
           
            preg_match('/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
                $headers['content-disposition'],
                $matches
            );
            list(,$type,$name) = $matches;

            $data[$name] = substr($body, 0, strlen($body) - 2);    
            
        }

    }

    $GLOBALS['_DELETE'] = $data;
    return;
}


class Api{

    function __construct(){
        
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

    }

    function get_header_token(){
        $token = "";
        $headers = apache_request_headers();

        if (isset($headers['Authorization'])) {
            $authorizationHeader = $headers['Authorization'];
            $matches = array();
            if (preg_match('/Bearer (.+)/', $authorizationHeader, $matches)) {
                if (isset($matches[1])) {
                    $token = $matches[1];
                }
            }
        }
        return $token;
    }

    function authenticated(){
      $token=$this->get_header_token();
     
      $jwt=new JWT();
        if($jwt->is_valid($token)){
            return true;
        }else{
            return false;
        }
    }

    function authorized(){
        $token=$this->get_header_token();
       
        $jwt=new JWT();
          if($jwt->is_valid($token)){
              return true;
          }else{
              return false;
          }
      }
}