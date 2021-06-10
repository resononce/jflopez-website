<?php
require('db_credentials.php');
$db = db_connect();
/**
 * Connects to the database and returns the pdo
 */
function db_connect()
{
  try {
    $dbh = new PDO(
      "mysql:dbname=" . DB_NAME . ";host=" . DB_SERVER,
      DB_USER,
      DB_PWD,
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  } catch (PDOException $e) {
    echo "This application exited with failure" .
      "because there was an error when trying to" .
      "connect to its database.";
    exit();
  }
  return $dbh;
}

/**
 * Disconnects from the database
 */
function db_disconnect()
{
  global $db;
  $db = null;
}

function register($email, $password)
{
  global $db;
  $registered = FALSE;
  try {
    $sql = "INSERT INTO Users(email, password) VALUES (?, ?)";
    $statement = $db->prepare($sql);
    $params = [$email, crypt($password)];
    $statement->execute($params);
    $registered = TRUE;
  } catch (PDOException $e) {
    echo "Error";
    var_dump($e);
  }

  return $registered;
}

function is_password_correct($email, $password)
{
  global $db;
  $password_correct = false;
  try {
    $sql = "SELECT password FROM Users WHERE email = ?";
    $statement = $db->prepare($sql);
    $statement->execute([$email]);
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($user) {
      foreach ($user as $row) {
        $correct_password = $row["password"];
        $password_correct = $correct_password === crypt($password, $correct_password);
      }
    }
    return $password_correct;
  } catch (PDOException $e) {
    $password_correct = false;
    var_dump($e);
  }
  return $password_correct;
}

function getUser($email){
  global $db;
  $result = [];
  try {
    $sql = "SELECT id, first_name, last_name, email, isAdmin FROM Users WHERE email = ?";
    $statement = $db->prepare($sql);
    $statement->execute([$email]);
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    $result["user"] = $user[0];
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

function get_jobs($made_by = null)
{
  global $db;
  $result = [];
  try {
    if ($made_by === null) {
      $sql = "SELECT id, name, made_by, x_coord, y_coord FROM Jobs";
      $statement = $db->prepare($sql);
      $statement->execute();
    } else {
      $sql = "SELECT id, name, made_by, x_coord, y_coord FROM Jobs WHERE made_by = ?";
      $statement = $db->prepare($sql);
      $statement->execute([$made_by]);
    }

    $jobs = $statement->fetchAll(PDO::FETCH_ASSOC); // puts in associative array (ready for json)

    $result["jobs"] = $jobs;
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

function insert_job($name, $made_by, $x_coord, $y_coord)
{
  global $db;
  $result = [];
  try {
    $sql = "INSERT INTO Jobs(name, made_by, x_coord, y_coord) VALUES(?, ?, ?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$name, $made_by, $x_coord, $y_coord]);
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

function update_job($id, $name, $made_by, $x_coord, $y_coord)
{
  global $db;
  $result = [];
  try {
    $sql = "UPDATE Jobs SET name = ?, made_by = ?, x_coord = ?, y_coord = ? WHERE id = ?";
    $statement = $db->prepare($sql);
    $statement->execute([$name, $made_by, $x_coord, $y_coord, $id]);
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
}

function delete_job($id)
{
  global $db;
  $result = [];
  try {
    $sql = "DELETE FROM Jobs WHERE id = ?";
    $statement = $db->prepare($sql);
    $statement->execute([$id]);
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

function insert_photo($job, $name)
{
  global $db;
  $result = [];
  try {
    $sql = "INSERT INTO Photos(job, name) VALUES(?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$job, $name]);
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}


function get_photos_for_job($job)
{
  global $db;
  $result = [];
  try {
    $sql = "SELECT job, name FROM Photos WHERE job = ?";
    $statement = $db->prepare($sql);
    $statement->execute([$job]);
    $photos = $statement->fetchAll(PDO::FETCH_ASSOC); // puts in associative array (ready for json)

    $result["photos"] = $photos;
    $result["status"] = "ok";
  } catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}
?>
