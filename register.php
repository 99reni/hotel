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
            h1 {font-size:16px;}
            .container h3{font-size:16px;}
        }
        @media (min-width: 768px) {
            h1 {font-size:32px;}
            .container h3 {font-size:32px;}
        }
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
    <link href="style2.css" rel="stylesheet" type="text/css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand"  href="index.php"><i class="fa fa-hotel"></i> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
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
            <li class="nav-item nav-item-right ">
                <a class="nav-link "  href="register.php">Register</a>
            </li>
            <li class="nav-item nav-item-right">
                <a class="nav-link " href="login.php">Login</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="post" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search"  name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

</nav>

<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title" style="-webkit-text-stroke: 1px rgba(82,80,80,0.73);">Echo</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->

<div class="card-section">
    <div class="container">
        <div class="card-block bg-white mb30">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2>Register</h2>
                        <br>
                    </div>


                        <div class="form-group  col-12 mx-auto>
                            <label for="username"><b>Username</b></label><br>
                            <input type="text" name="username" class="form-control col-sm-12 col-md-6" id="username" placeholder="Enter Username"><br>
                        <label for="firstname"><b>First name</b></label><br>
                            <input type="text" name="firstname" class="form-control col-sm-12 col-md-6" id="firstname" placeholder="Enter last name" ><br>
                        <label for="lastname"><b>Last name</b></label><br>
                            <input type="text" name="lastname" class="form-control col-sm-12 col-md-6" id="lastname"  placeholder="Enter last name" ><br>
                        </div>

                        <div class="form-group col-12 mx-auto">
                            <label for="password1"><b>Password</b></label><br>
                            <input type="password" name="password1" class="form-control col-sm-12 col-md-6" id="password1" ><br>
                        </div>

                        <div class="form-group col-12">
                            <label for="password2" ><b>Repeat Password</b></label><br>
                            <input type="password" name="password2" class="form-control col-sm-12 col-md-6" id="password2" ><br>
                        </div>

                        <div class="form-group col-12">
                            <label for="email"><b>Email Address</b></label><br>
                            <input type="email" name="email" class="form-control col-sm-12 col-md-6" id="email" ><br>
                        </div>
                        <button type="submit" class="btn btn-primary col-sm-12 col-md-3  col-12">Register</button>
                        <button type="reset" class="btn bg-light col-sm-12 col-md-3 col-12" style="color:#000000;">Cancel</button>




            </div>
        </div>
    </div>
</div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
