<?php
if (isset($_REQUEST["file"])) {
  $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string

  if (preg_match('//', $file)) {
    $filepath = $file;

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush();
    readfile($filepath);
  } else {
    die("Invalid file name!");
  }
}
