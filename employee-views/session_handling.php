
<?php
session_start();
#redirect if not logged in
function ensure_logged_in() {
    if(!isset($_SESSION["first_name"])) {
        redirect("login.php", "You must log in before you can view this page.");
    }
}

#redirect to a page
function redirect($url, $message = NULL){
    if($message){
        $_SESSION["flash"] = $message;
    }

    header("Location: $url");
    die;
}

function logout(){
    session_destroy();
    redirect("login.php", "You have successfully logged out.");
    die;
}
?>
