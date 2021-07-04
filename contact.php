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
            .container h3{
                font-size:16px;
            }

        }

        @media (min-width: 768px) {
            h1 {font-size:32px;}
            .container h3 {font-size:32px;}
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
        <div class="row col-12 bg bg-white mx-auto" >

                    <!-- section-title -->
                    <div class="section-title mb-0 mt-5 col-12">
                        <h2>Contact</h2>
                        <br>

                    </div>
                    <!-- /.section-title -->

                    <div class="row col-12 mx-auto mb-5" >
                            <form action="info.php"  class="col-12 col-sm-12 col-md-6" method="post">
                                <input class="form-control " name="name" placeholder="Name..." /><br>
                                <input class="form-control" name="phone" placeholder="Phone..." /><br>
                                <input class="form-control" name="email" placeholder="Your e-mail..." /><br>
                                <textarea class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
                                <div class="row col-12 mx-auto">
                                <input class="btn btn-primary col-md-4 col-12 mx-auto" type="submit" value="Send" />
                                    <input class="btn btn-danger text-white col-md-4 col-12 mx-auto" type="reset" value="Reset" />
                                </div>
                            </form>
                            <?php
                            $c = "";

                            if (isset($_GET["c"])) {
                                $c = $_GET["c"];
                                $message_c='';
                                switch ($c) {

                                    case "0" :
                                        $message_c="You sent your letter!";
                                        break;
                                    case "1":
                                        $message_c="You did not send the letter!";
                                        break;
                                    case "2":
                                        $message_c="Something went wrong!";
                                        break;
                                    case "3":
                                        $message_c="You need to fill the all fields!";
                                        break;
                                }
                                echo "<script type='text/javascript'>alert('$message_c');</script>";
                            }
                            ?>
                        <div class="col-md-6 col-lg-6  col-sm-12 text-center" style="padding-top: 35px;">
                            <b>Montenegro, Budva </b><br>
                            <b>Road 55, 28000</b><br>
                            <b>Phone:</b> 024 555 555<br>
                            <b>Mobile:</b> 065 669 994<br>
                            <b>E-mail: echo@gmail.com<br>

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
