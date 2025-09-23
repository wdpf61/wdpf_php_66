<?php

class JWT{
   
    private $headers;
    private $secret;
    public $min;

    public function __construct(){
       $this->headers=[
           'alg'=>'HS256',
           'typ'=>'JWT',
           'ip' =>get_ip(),
           'iss'=>'jwt.server',
           'aud'=>'intels.co'
        ];
       $this->secret="sdf35345fsfsd3453454344sfsk";
       $this->min=50;
    }

    public function generate(array $payload):string{

        $headers=$this->encode(json_encode($this->headers));
        $payload["exp"]=time()+(60*60*$this->min);       
        $payload=$this->encode(json_encode($payload));
        $signature=hash_hmac("SHA256","$headers.$payload",$this->secret,true);
        $signature=$this->encode($signature);
       
        return "$headers.$payload.$signature";
    }

    public function encode(string $str):string{

        return rtrim(strtr(base64_encode($str),"+/","-_"),"=");
    }

     public function is_valid(string $jwt):bool{

        $token=explode(".",$jwt);
      
       //Headers check
        if(isset($token[0])){
            $client_headers=base64_decode($token[0]);
        }else{
            return false;
        }

        //Payload cheack
        if(isset($token[1])){
            $client_payload=base64_decode($token[1]);
        }else{
            return false;
        }          
       
        //Signature check
        if(isset($token[2])){
          $client_signature=$token[2];
        }else{
            return false;
        }
        
              
       
        if(!json_decode($client_payload)){
            return false;
        }

        if((json_decode($client_payload)->exp-time())<0){    
            return false;
        }

        if(isset(json_decode($client_payload)->iss)){   
           if(isset(json_decode($client_headers)->iss)){         
            if(json_decode($client_payload)->iss!=json_decode($client_headers)->iss){
                return false;
            }
           }else{
            return false;
           }
        }else{
            return false;
        }

        if(isset(json_decode($client_payload)->aud)){    
            if(isset(json_decode($client_headers)->aud)){        
                if(json_decode($client_payload)->aud!=json_decode($client_headers)->aud){
                    return false;
                }
           }else{
            return false;
           }
        }else{
            return false;
        }

        if(isset(json_decode($client_payload)->ip)){   
            if(isset(json_decode($client_headers)->ip)){         
                if(json_decode($client_payload)->ip!=json_decode($client_headers)->ip){
                    return false;
                }
           }else{
            return false;
           }
        }else{
            return false;
        }


        $base64_headers=$this->encode($client_headers);        
        $base64_payload=$this->encode($client_payload); 

        $server_signature=hash_hmac("SHA256","$base64_headers.$base64_payload",$this->secret,true);
        $server_signature=$this->encode($server_signature);
      

       //echo "(".time()."-";
       //echo json_decode($client_payload)->exp.")=".(time()-json_decode($client_payload)->exp);
       
        return ($server_signature===$client_signature);
    }

}

