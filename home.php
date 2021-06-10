<?php
  include("employee-views/database.php");
?>
<!DOCTYPE html>
<html style="height: 100%;" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JF Lopez Roofing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link 
    rel="stylesheet" 
    href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" 
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" 
    crossorigin="" />
  <script 
    src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin="">
  </script>
  <script src="http://webdev.cs.uwosh.edu/students/lopeze37/project/home.js" defer></script>
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
          <a class="nav-link active" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/home.php">
            Home
            <span class="sr-only">(current)
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" href="#" role="button" aria-haspopup="true" data-toggle="dropdown">
            Services
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/commercial.php">Commercial</a>
            <a class="dropdown-item" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/residential.php">Residential</a>
            <a class="dropdown-item" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/mandr.php">Maintenence and Repairs</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/contact.php">Contact Us</a>
        </li>
      </ul>
    </div>
    <span class="navbar-text" style="font-family: 'Roboto Slab';">
      Creating A Legacy Of Which Our Grandchildren Will Be Proud
    </span>
  </nav>

  <div class="container card my-1 p-1">
    <div class="row card-body">
      <div class="col-md">
        <div id="gallery" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/building.webp" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/house.webp" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/shingle.webp" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/commercial.webp" alt="Third slide">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="col-sm">
        <h5>
          Providing Solutions for All Your Roofing Needs
        </h5>
        <p>
          JF Lopez Roofing LLC is a locally owned
          and operated roofing contractor dedicated to
          serving our customers with superior solutions.
          Whether it's roof replacements, repairs,
          storm cleanup, or new construction our passionate team
          of experts is ready to work with you.
        </p>
        <a href="customer-views/contact.php" class="btn btn-info">Call for a Free Estimate!</a>

      </div>
    </div>

  </div>

  <div class="container card my-1 p-1">
    <div class="row card-body">
      <div class="col-md">
        <h5 class="mt-0 mb-1">
          Industry Leading Workmanship
        </h5>
        Our commitment to serve our customers
        with a problem solving attitude sets us apart
        from others. JF Lopez Roofing values honest and ethical
        practices and always put our customers first. Our
        goal is to set the bar high in safety, problem solving,
        lean practices, and creating a family culture in which to work.
      </div>
      <div class="col-sm">
        <img class="ml-2 d-block w-100" src="images/worker.webp" alt="Man at Work">
      </div>
    </div>
  </div>

  <div class="container card my-1 p-1">
  <div class="row card-body">
      <div class="col-md">
        <div id="mapid"></div>
      </div>
      <div class="col-sm">
        <h5>
          Service Area and Points of Interest
        </h5>
      </div>
  </div>

  </div>
  <footer>
    Disclaimer: This site is under development by UW-Oshkosh students as a prototype for the organization JFLopez Roofing. Nothing on the site should be construed in any way as being officially connected with or representative of JFLopez Roofing.
  </footer>
</body>

</html>