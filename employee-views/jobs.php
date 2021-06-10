<?php

require('database.php');
$db = db_connect();


/*
TODO:
Implement endpoints described in the lab writeup

Hints:
- Use $_SERVER["REQUEST_METHOD"] to detect if a request is a GET or POST request
- If it's a GET request, you can use empty($_GET) to check if there are no GET parameters
- Look at database.php to see what's implemented for you...
*/
$requestMethod = $_SERVER["REQUEST_METHOD"];

// GET Endpoints

  // Endpoint for getting the complete chat history
  // GET /chat.php

  
  // Endpoint for getting new chats since given last chat id
  // GET /chat.php?last_id=#

  
// Endpoint for user sending new chat
if($requestMethod == 'GET'){
  if(empty($_GET)){
    //jobs.php
    echo json_encode(get_jobs());
  }else{
    //jobs.php?id=#
    echo json_encode(get_jobs($_GET['id']));
  }
  
}
// POST /jobs.php
// Set content type to json, and output json in page to be sent
else{
  header("Content-type: application/json");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if(!isset($_POST['id'])){
      echo json_encode(insert_job($_POST['name'], $_POST['made_by'], $_POST['x_coord'], $_POST['y_coord']));
  }else{
    if($_POST['delete'] == 1){
      echo json_encode(delete_job($_POST['id']));
    }
  }
}



db_disconnect();

?>