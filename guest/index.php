
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

        @media (min-width: 280px) {
            h1 {font-size:16px;}
            .container h3{
                font-size:16px;
            }
            .container h1{
                font-size:25px;
            }

        }

        @media (min-width: 768px) {
            h1 {font-size:32px;}
            .container h3 {font-size:32px;}
            .container h1 {font-size:32px;}
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
            <li class="nav-item">
                <a class="nav-link" href="booking.php">Your room</a>
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

            <div class="section-title col-12 ml-4 mt-5 mb-0">
                <?php
                session_start();
                echo "<h1>Welcome to our web site</h1>";
                ?>
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
                        <img class="d-block img-responsive img-fluid mx-auto" src="/hotel/image/1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-responsive img-fluid mx-auto" src="/hotel/image/5.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-responsive img-fluid mx-auto" src="/hotel/image/2.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-responsive img-fluid mx-auto" src="/hotel/image/4.jpg" alt="Fourth slide">
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

        </div>
    </div>
</div>

<?php
include('C:\xampp\htdocs\hotel\db_config2.php');
$header_ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$words = array("android","mobile","samsung","phone","mobi","nokia");
$mobile = false;
$match = "";
$userAgents = $_SERVER['HTTP_USER_AGENT'];
$device = "desktop";
$date = date("Y-m-d h:i:m");
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip=getUserIpAddr();
foreach($words as $word)
{
    if(strpos($header_ua,$word)!==false) // http://php.net/manual/en/function.strpos.php
    {
        $mobile = true;
        $device = "mobile";
        break;
    }
}
$id=$_SESSION['id_user'];
$query2=mysqli_query($connection,"SELECT * FROM statistic where  id_user=".$_SESSION['id_user']);
if(mysqli_num_rows($query2)!=0) {
    $sql0 = "UPDATE statistic SET user_agent_string='$userAgents', device='$device', ip_address='$ip', date_time='$date' WHERE id_user='$id'";
    $myData = mysqli_query($connection, $sql0);
}
else{
    $sql = "INSERT INTO statistic(user_agent_string, device,ip_address, date_time,id_user)
      VALUES ('$userAgents', '$device', '$ip','$date','$id')";

    $result =  mysqli_query($connection,$sql) or die (mysqli_error($connection));


}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>