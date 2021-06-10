<?php
include("session_handling.php");
include("database.php");

$registerFailed = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $email = $_POST["email"];

    if (register($email, $password)) {
        redirect("login.php", "Registration successful, Await confirmation.");
    } else {
        $registerFailed = TRUE;
    }
}

?>
<!DOCTYPE html>
<html style="height: 100%;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="position: relative; min-height: 100%; top: 0px; padding-top:65px" class="bg-light">

    <div class="container card my-1 p-1">
        <?php if (isset($_SESSION["flash"])) { ?>
            <p><?= $_SESSION["flash"] ?></p>
        <?php unset($_SESSION["flash"]);
        } ?>
        <?php if ($registerFailed) { ?>
            <p>Registration has failed</p> <?php
                                        } ?>
        <h1>Register</h1>
        <form id="login" action="register.php" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="anon@jflopezroofing.com" aria-describedby="email">
            </div>
            <div class="form-group">
                <label for="email">Password: </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="1234567" aria-describedby="password">
            </div>
            <input type="submit" value="Register" class="btn btn-light">
            <a href="http://webdev.cs.uwosh.edu/students/lopeze37/project/employee-views/login.php" class="btn btn-light" type="button" role="button">Login</a>
        </form>
    </div>

    </div>
    <footer>
        Disclaimer: This site is under development by UW-Oshkosh students as a prototype for the organization JFLopez Roofing. Nothing on the site should be construed in any way as being officially connected with or representative of JFLopez Roofing.
    </footer>
</body>

</html>