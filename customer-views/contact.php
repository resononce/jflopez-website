<!DOCTYPE html>
<html style="height: 100%;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JF Lopez Roofing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="aboutus.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <a class="nav-link" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/home.php">
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
                    <a class="nav-link active" href="http://webdev.cs.uwosh.edu/students/lopeze37/project/customer-views/contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <span class="navbar-text" style="font-family: 'Roboto Slab';">
            Creating A Legacy Of Which Our Grandchildren Will Be Proud
        </span>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <form action="mailto:customercare@jflopezroofing.com?subject=Website Email" method="post" enctype="text/plain">
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="address" id="address" name="address" class="form-control" placeholder="123 abc street">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number: </label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="111-111-111">
                    </div>
                    <div class="form-group">
                        <label for="message">Message: </label>
                        <textarea id="message" name="message" class="form-control" rows="5" cols="33"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm">
                <h2>Contact Information</h2>
                <address>
                    Phone Number: <a class="button btn-light" href="tel:+19209336440">1(920)933-6440</a><br>
                    Email: <a class="button btn-light"  href="mailto:customercare@jflopezroofing.com">customercare@jflopezroofing.com</a><br>
                    N7459 Osborn Way, Fond du Lac, Wi, 54935 <br>
                </address>
            </div>
        </div>
    </div>
    <footer>
        Disclaimer: This site is under development by UW-Oshkosh students as a prototype for the organization JFLopez Roofing. Nothing on the site should be construed in any way as being officially connected with or representative of JFLopez Roofing.
    </footer>
</body>

</html>