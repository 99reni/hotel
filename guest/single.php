<?php
session_start();
include ('C:\xampp\htdocs\hotel\db_config2.php');

?>
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
                <h2 style="margin-bottom: 100px;">Single room</h2>

            </div>

            <?php
            $sql = "SELECT room_price,room_image,free_room,discount,room_type,room_id
                    FROM room
                    WHERE room_type='single';";

            $result = $connection->query($sql);
            if ($result->num_rows > 0)
            {

                while ($row = $result->fetch_assoc()) {
                    echo " <div class='card mx-auto col-md-5 col-sm-12 col-12' style='margin-bottom: 70px;' >";
                    echo '<form method="post" action="booking.php">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['room_image']) . '" alt="single room"  class="card-img-top img-responsive img-fluid">';
                    echo "<div class='card-body text-center'>";
                    echo "<ul class='list-group list-group-flush'>";
                    if ($row['discount'] > 0) {
                        if ($row['discount'] == 50) {
                            echo "<li class='list-group-item text-center text-white  bg bg-danger'><b>Discount: </b>" . $row["discount"] . "%" . "</li>";
                        } else {
                            echo "<li class='list-group-item text-center text-white  bg bg-warning'><b>Discount: </b>" . $row["discount"] . "%" . "</li>";
                        }
                    }
                    echo "<li class='list-group-item text-center'><b>Price: </b>" . $row["room_price"] . " &euro;/night" . "</li>";
                    echo "<li class='list-group-item text-center'><b>Free rooms: </b>" . $row["free_room"] . "</li>";
                    echo "</ul>";

                    $_SESSION['room_id'] = $row["room_id"];
                    $_SESSION['room_type'] = $row['room_type'];
                    $_SESSION['room_price'] = $row['room_price'];
                    $_SESSION['discount'] = $row['discount'];


                    /*echo "<input type='hidden' name='hidden_price' value='".$row["room_price"]."'>";
                    echo "<input type='hidden' name='hidden_id' value='".$row["room_id"]."'>";
                    echo "<input type='hidden' name='hidden_type' value='".$row["room_type"]."'>";*/
                    echo '<button type="submit" name="add"  class="btn btn-primary  col-md-3 col-sm-12 col-12 mx-auto"  data-toggle="button"> Book</button>';
                    echo '</form>';
                    echo "</div>";
                    echo "</div>";
                }

            }?>
        </div>

    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
