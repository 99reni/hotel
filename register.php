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
    <div class="container mx-auto" >
        <div class="row col-12 bg bg-white mx-auto  pl-5" >

                    <div class="section-title mb-0 mt-5">
                        <h2>Register</h2>
                        <br>
                    </div>


                        <div class="form-group  col-12 mx-auto mb-5">


                            <form method="post" action="web.php" name="register">
                                <div style="color:#f00;">
                                    <?php

                                    $l = "";

                                    if (isset($_GET["l"])) {
                                        $l = $_GET["l"];

                                        switch ($l) {
                                            case "0" :
                                                echo "No direct access!";
                                                break;

                                            case "1" :
                                                echo "Unknown user!";
                                                break;

                                            case "2" :
                                                echo "User with this name already exists, choose another one!";
                                                break;

                                            case "3" :
                                                echo "Check your email to active your account!";
                                                break;

                                            case "4" :
                                                echo "Fill all the fields!";
                                                break;

                                            case "5" :
                                                echo "You are logged out!";
                                                break;

                                            case "6" :
                                                echo "Your account is activated, you can login now!";
                                                break;

                                            case "7" :
                                                echo "Security code is invalid!";
                                                break;

                                            case "8" :
                                                echo "Your password is too short.";
                                                break;


                                        }
                                    }
                                    ?>
                                </div>
                                <label for="username2">Username: </label> <br><input type="text" class="form-control col-sm-12 col-md-6" name="username" id="username2"><br>
                                <label for="password2">Password: </label>  <br><input type="password" class="form-control col-sm-12 col-md-6" name="password" id="password2"> (min 8
                                characters)<br>
                                <label for="firstname">Firstname: </label>  <br><input type="text" class="form-control col-sm-12 col-md-6" name="firstname" id="firstname"><br>
                                <label for="lastname">Lastname: </label> <br><input type="text" class="form-control col-sm-12 col-md-6" name="lastname" id="lastname"><br>
                                <label for="email">E-mail: </label> <br><input type="text" class="form-control col-sm-12 col-md-6" name="email" id="email"> (valid email address)<br>
                                <label for="captcha">Captcha: </label> <br>
                                <input type="text" class="form-control col-sm-12 col-md-6" name="captcha" id="captcha" size="8"> <br>
                                <img src="captcha.php"  border="0" width="80" height="60" alt="code"> <br><br>
                                <input type="submit"  class="col-sm-12 col-md-3  col-12 btn btn-success" name="sd" value="Register">
                                <input type="reset" class="col-sm-12 col-md-3  col-12 btn btn-danger" name="rd" value="Cancel">
                            </form>
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
