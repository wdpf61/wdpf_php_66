<?php
// file-download.php

// Path to the file
$file = "uploads/pdf.pdf"; // make sure file exists in this path

//  if (file_exists($file)) {
//     header("Content-Type: application/octet-stream");  // if file mime type is unkown
//     header('Content-Disposition: attachment; filename="' . basename($file) . '"');
//     readfile("myfile.txt");
//  }


// Check if file exists
if (file_exists($file)) {
    // Set headers for download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Clear output buffer
    flush();

    // Read file and send to browser
    readfile($file);
    exit;
} else {
    echo "File not found!";
}
?>
