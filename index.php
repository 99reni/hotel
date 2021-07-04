<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    @media (max-width: 768px) {
    h1 {font-size:20px;
    }

     @media (min-width: 777px) {
         h1 {font-size:25px;
         }


</style>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand"  href="index.php"><i class="fa fa-hotel"></i> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="aboutus.php">About us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                Rooms
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="single.php">Single room</a>
                <a class="dropdown-item" href="double.php">Double room</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="multiple.php">Multiple room</a>
            </div>
        </li>
        <li class="nav-item navbar-right ">
            <a class="nav-link "  href="register.php">Register</a>
        </li>
        <li class="nav-item navbar-right">
            <a class="nav-link " href="login.php">Login</a>
        </li>
    </ul>
</div>

</nav>
<div id="welcome" style="background-color: rgba(173, 172, 172, 0.52);" class="col-md-3 col-sm-10 col-10 mx-auto">
    <h1>Welcome in Echo</h1>
</div>

    <div id="carouselExampleIndicators" class="carousel slide mx-auto col-md-8 col-sm-11 col-11 mt-5 mb-5" data-ride="carousel">
        <ol class="carousel-indicators mx-auto">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner mx-auto">
            <div class="carousel-item active">
                <img class="d-block img-responsive img-fluid mx-auto" src="image/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-responsive img-fluid mx-auto" src="image/5.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-responsive img-fluid mx-auto" src="image/2.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-responsive img-fluid mx-auto" src="image/4.jpg" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
