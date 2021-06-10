<?php

require('employee-views/database.php');
$db = db_connect();
$requestMethod = $_SERVER["REQUEST_METHOD"];

// GET Endpoints
// Endpoint for user sending new photo
if ($requestMethod == 'GET') {
    echo json_encode(get_photos_for_job($_GET['job']));
}
// POST /photos.php
// Set content type to json, and output json in page to be sent
else {
    $upload_dir= "../uploads";
    $tmp_name= $_FILES["file"]["tmp_name"];
    $name = basename($_FILES["file"]["name"]); 
    move_uploaded_file($tmp_name, "$upload_dir/$name");
    echo json_encode(insert_photo($_POST["job"], $name));
}



db_disconnect();
?>
