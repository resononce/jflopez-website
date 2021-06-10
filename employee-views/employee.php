<?php
include("session_handling.php");
include("database.php");
ensure_logged_in();
?>

<script type="text/javascript">
  var made_by = <?php echo json_encode($_SESSION['id']); ?>;
  var isAdmin = <?php echo json_encode($_SESSION['isAdmin']); ?>;
</script>

<!DOCTYPE html>
<html style="height: 100%;" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JF Lopez Roofing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="employee.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
  </script>
  <script src="employee.js" defer></script>
</head>

<body style="position: relative; min-height: 100%; top: 0px; padding-top:65px" class="bg-light">
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">
      <img width="70" height="40" src="http://webdev.cs.uwosh.edu/students/lopeze37/project/images/jflopez.webp" alt="JF Lopez" class="img-rounded">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/employee-views/employee.php">
            Map Information
            <span class="sr-only">(current)
          </a>
        </li>
      </ul>

      <a class="button btn btn-sm btn-outline-danger" id="logout" href='logout.php'>Log Out</a>
    </div>

    <span class="navbar-text" style="font-family: 'Roboto Slab';">
      Creating A Legacy Of Which Our Grandchildren Will Be Proud
    </span>
  </nav>

  <div class="container card my-1 p-1">
    <div class="row card-body">
      <div class="col-md">
        <div id="mapid"></div>
      </div>
      <div class="col-sm">
        <h5>
          Points of Interest
        </h5>
        <div >
          <ul class="list-group" id="points">

          </ul>

        </div>
      </div>
    </div>
  </div>


  <div class="container card my-1 p-1">
    <div class="row card-body">
      <form id="jobForm">
        <div class="form-group">
          <label for="name">Name of Job: </label>
          <input type="text" name="name" id="name" class="form-control" placeholder="wilson" aria-describedby="name" required>
        </div>
        <div class="form-group">
          <label for="x_coord">X-Coordinate: </label>
          <input type="number" name="x_coord" id="x_coord" class="form-control" step="any" placeholder="0" aria-describedby="x_coord" required>
        </div>
        <div class="form-group">
          <label for="y_coord">Y-Coordinate: </label>
          <input type="number" name="y_coord" id="y_coord" class="form-control" step="any" placeholder="0" aria-describedby="y_coord" requierd>
        </div>
        <div hidden>
          <input type="number" name="made_by" id="made_by" class="form-control" placeholder="0" value="<?= $_SESSION['id']; ?>">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>

  <footer>
    Disclaimer: This site is under development by UW-Oshkosh students as a prototype for the organization JFLopez Roofing. Nothing on the site should be construed in any way as being officially connected with or representative of JFLopez Roofing.
  </footer>
</body>

</html>