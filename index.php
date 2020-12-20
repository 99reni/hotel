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
    @media (min-width: 344px) {
    h1 {font-size:16px;} /*1rem = 16px*/
    }

    /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
    @media (min-width: 768px) {
        h1 {font-size:32px;} /*1rem = 16px*/
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
    <form class="form-inline my-2 my-lg-0" action="search.php" method="post" >
        <input class="form-control mr-sm-2" type="search" placeholder="Search"  name="search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

</nav>
<div id="welcome" class="col-3 mx-auto">
    <h1>Welcome in Echo</h1>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
