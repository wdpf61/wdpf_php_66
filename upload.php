<?php
  $fileName = null;
if (isset($_POST['upload'])) {
    $fileName = $_FILES['myfile']['name'];   // Original file name
    $fileTmp  = $_FILES['myfile']['tmp_name']; // Temporary location
    $folder   = "uploads/";

    // Make sure folder exists
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Move file to folder
    if (move_uploaded_file($fileTmp, $folder . $fileName)) {
        echo " File uploaded successfully: " . $fileName;
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" required>
        <button type="submit" name="upload">Upload</button>
    </form>

     <img src="uploads/<?php echo $fileName ?>" alt="" srcset="">
</body>
</html>
