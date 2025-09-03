<?php
function upload($file, $imgName = "")
{

    $name = $file['name'];         //   file name 
    $fileTmp = $file["tmp_name"]; //   Temporary location
    $fileSize = $file["size"];   //   file size
    $fileType = $file["type"];   //   file type
    $folder   = "uploads/";      //   upload folder

    $allowsize = 2 * 1024 * 1024;     //   convert to byte 

    $allowedMimeType = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ];

    $ext = pathinfo($name, PATHINFO_EXTENSION); // file extention



    // Make sure folder exists
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // // Move file to folder

    if ($fileSize > $allowsize) {
        die("File is too large. Max allowed: " . ($allowsize / 1024 / 1024) . " MB");
    }

    if (!in_array($fileType,  $allowedMimeType)) {
        die("Invalid file type (MIME not allowed): " . $fileType);
    }

    if ($imgName != "") {
        $newName = $imgName . "." . $ext;
        if (move_uploaded_file($fileTmp, $folder .   $newName)) {
            echo " File uploaded successfully: " .   $newName;
            return  $newName;
        } else {
            echo "Failed to upload file.";
        }
    } else {

        if (move_uploaded_file($fileTmp, $folder . $name)) {
            echo " File uploaded successfully: " . $name;
             return  $name;
        } else {
            echo "Failed to upload file.";
        }
    }


   function ActionButton($data){
      
   }

}
