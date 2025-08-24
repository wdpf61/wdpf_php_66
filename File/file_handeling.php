<?php
// FILE HANDLING IN PHP - COMPLETE EXAMPLES
// 1 execute 2 write 4 read 
// owner,owner group,anyone



// fopen()	Open a file
// fwrite()	Write data to a file
// fread()	Read data from a file
// fclose()	Close a file
// file_get_contents()	Read entire file as a string
// file_put_contents()	Write data to file
// fgets()	Read a single line from a file
// feof()	Check if end of file is reached
// file_exists()	Check if file exists
// unlink()	Delete a file
// copy()	Copy a file
// rename()	Rename/move a file
// mkdir()	Create a new directory
// rmdir()	Remove an empty directory
// scandir()	List files/directories in a directory
// chmod()	Change file permissions
// basename()	Get filename from a path
// dirname()	Get directory path
// filesize()	Get file size in bytes
// is_file()

echo "<h2>PHP File Handling Functions Examples</h2>";

// // 1. fopen() - Open a file
// $file = fopen("example.txt", "w") or die("Unable to open file!");
// echo "fopen(): File opened for writing<br>";

// // 2. fwrite() - Write data to a file
// fwrite($file, "Hello, this is a test file.\n");
// echo "fwrite(): Data written to file<br>";

// // 3. fclose() - Close a file
// fclose($file);
// echo "fclose(): File closed<br>";

// // 4. fread() - Read data from a file
// $file = fopen("example.txt", "r");
// $content = fread($file, filesize("example.txt"));
// echo "fread(): " . $content . "<br>";
// fclose($file);

// // 5. file_get_contents() - Read entire file as string
// $data = file_get_contents("example.txt");
// echo "file_get_contents(): " . $data . "<br>";

// // 6. file_put_contents() - Write data to file (overwrite)
// file_put_contents("example.txt", "New content added!\n",FILE_APPEND);
// echo "file_put_contents(): New content written<br>";

//7. fgets() - Read a single line from a file
// $file = fopen("example.txt", "r");
// echo "fgets(): " . fgets($file, 1000) . "<br>";
// // fclose($file);

//  // 8. feof() - Check if end of file is reached
// $file = fopen("example.txt", "r");
// while(!feof($file)) {
//     echo "feof(): " . fgets($file) . "<br>";
// }
// fclose($file);

// // 9. file_exists() - Check if file exists
// echo "file_exists(): " . (file_exists("example.txt") ? "Yes" : "No") . "<br>";

// 10. unlink() - Delete a file
// copy("example.txt", "copy.txt"); // create copy for next steps
//  unlink("copy.txt"); // Uncomment to delete
// echo "unlink(): File deletion example (uncomment to delete)<br>";

// // 11. copy() - Copy a file
// copy("example.txt", "copy_example.txt");
// echo "copy(): File copied to copy_example.txt<br>";

// // 12. rename() - Rename/move a file
// rename("copy_example.txt", "renamed_example.txt");
// echo "rename(): File renamed to renamed_example.txt<br>";

// // 13. mkdir() - Create a new directory
// mkdir("new_folder");
// echo "mkdir(): Directory 'new_folder' created<br>";

// // 1 execute   
// // 2 write 
// // 4 read

// // 14. rmdir() - Remove an empty directory
//  rmdir("new_folder"); // Uncomment to remove
// echo "rmdir(): Directory removal example (uncomment to delete)<br>";

// // 15. scandir() - List files in a directory
// $files = scandir(".");
// echo "scandir(): Current directory files - " . implode(", ", $files) . "<br>";

// // 16. chmod() - Change file permissions
// chmod("example.txt", 0777);
// echo "chmod(): Permissions changed for example.txt<br>";

// // 17. basename() - Get filename from a path
// echo "basename(): " . basename("E:/xampp/htdocs/wdpf-batch-66_class/php/phpbasic/File/exmaple.txt") . "<br>";

// 18. dirname() - Get directory path
// echo "dirname(): " . dirname("E:/xampp/htdocs/wdpf-batch-66_class/php/phpbasic/File/exmaple.txt") . "<br>";

// // 19. filesize() - Get file size in bytes
// echo "filesize(): " . filesize("example.txt") . " bytes<br>";

// // 20. is_file() - Check if it's a file
// echo "is_file(): " . (is_file("example.txt") ? "Yes" : "No") . "<br>";

// // EXTRA FUNCTIONS:

// // 21. is_dir() - Check if it's a directory
// echo "is_dir(): " . (is_dir("uploads") ? "Yes" : "No") . "<br>";

// // 22. realpath() - Get absolute path
// echo "realpath(): " . realpath("example.txt") . "<br>";

// // // 23. pathinfo() - Get file info
// $info = pathinfo("example.txt");
// echo "pathinfo(): " . print_r($info, true) . "<br>";

//24. clearstatcache() - Clear cached info about files
// clearstatcache();
// echo "clearstatcache(): Cache cleared<br>";


?>
