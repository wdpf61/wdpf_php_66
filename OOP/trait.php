<?php
trait Log{
    public function log($msg) {
        // Append the message to log.txt with timestamp and new line
        file_put_contents("log.txt", date("Y-m-d H:i:s") . " - " . $msg . PHP_EOL, FILE_APPEND);
    }
}

?>