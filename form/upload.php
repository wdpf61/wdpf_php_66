<?php
$fileName = null;
if (isset($_POST['btnSubmit'])) {
      //    print_r( $_FILES);
       $file = $_FILES['myfile'];   // Original file 
       $name=$file['name'];         //   file name 
       $fileTmp =$file["tmp_name"]; //   Temporary location
       $fileSize = $file["size"];   //   file size
       $fileType = $file["type"];   //   file type
       $folder   = "uploads/";      //   upload folder
       
       $allowsize= 2*1024*1024;     //   convert to byte 

       $allowedMimeType =[
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
      ];
       
       $ext = pathinfo($name, PATHINFO_EXTENSION); // file extention
       $newName = uniqid("pic_", true) . "." . $ext;
      
    // Make sure folder exists
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // // Move file to folder

    if( $fileSize > $allowsize){
         die("File is too large. Max allowed: " . ($allowsize / 1024 / 1024) . " MB");
    }

    if(!in_array($fileType,  $allowedMimeType)){
        die("Invalid file type (MIME not allowed): " .$fileType);
    }


    if (move_uploaded_file($fileTmp, $folder . $name)) {
        echo " File uploaded successfully: " . $name;
    } else {
        echo "Failed to upload file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" >
        <button type="submit" name="btnSubmit">Upload</button>
    </form>
      

     <!-- <img src="uploads/<?php //echo $name ?>" alt="" srcset=""> -->
     <embed src="uploads/<?php echo $name ?>" type="" width="300" height="500">

</body>
</html>


<!-- https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types/Common_types -->