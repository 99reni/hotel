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
    <link href="/hotel/style2.css" rel="stylesheet" type="text/css">

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
            <li class="nav-item">
                <a class="nav-link" href="booking.php">Your room</a>
            </li>

        </ul>
        <a class="navbar-brand" href="/hotel/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
            <div class="section-title col-12 ml-4 mt-5 mb-0">
                <h2 style="margin-bottom: 30px;">About us</h2>
            </div>

                    <p style="margin: 30px;">No two neighborhoods are alike. Neither are any two Echo properties.
                    When you stay with us, you’re not just staying anywhere, you’re staying somewhere—within a vibrant community,
                    in a unique hotel that combines authentic local experiences, modern design and intimate service with the peace of mind Each hotel is as individual as its surroundings and is also a reflection of them.
                    You can taste the local flavor on our menus and see it in the art and photography displayed on our walls.
                    You’ll catch guests and neighbors hanging out in our bars,
                    get great advice from our team members on what to see and do in the neighborhood,
                     and be refreshed by just how relaxed and inviting it all feels.
                    </p>



                    <h2  class="pb-5 pl-5">Our services</h2>
                    <div class="container mb-5">
                        <h3 class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto text-center">Swimmingpool</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto services"><img class="img-responsive img-fluid img-thumbnail" src="/hotel/style/swimmingpool.jpg" alt="swimmingpool"></div>
                        </div>
                        <br>
                        <h3 class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto text-center">Gym</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto services"><img class="img-responsive img-fluid img-thumbnail" src="/hotel/style/gym.jpg" alt="gym"></div>
                        </div>
                        <br>
                        <h3 class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto text-center">Restaurant</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto services"><img class="img-responsive img-fluid img-thumbnail" src="/hotel/style/restaurant.jpg" alt="restaurant"></div>
                        </div>
                        <br>
                        <h3 class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto text-center">Room services</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-12 mx-auto services"><img class="img-responsive img-fluid img-thumbnail" src="/hotel/style/roomservice.jpg" alt="rooomservices"></div>
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
