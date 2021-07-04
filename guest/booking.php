<?php
session_start();
include('C:\xampp\htdocs\hotel\db_config2.php');
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
                    <div class="section-title  ml-4 mt-4 mb-0">
                        <h2 style="margin-bottom: 100px;">Book</h2>

                    </div>
                <div class="row col-12 mb-5">
                    <table class="table text-center mx-auto mt-auto table-responsive-sm table-responsive-md col-lg-6 col-12 col-sm-11 col-md-4 " >
                        <?php
                        $query2=mysqli_query($connection,"SELECT * FROM price");
                        if(mysqli_num_rows($query2)!=0) {
                            echo "<tr style='background-color: #63a9f3;'>";
                            echo"<td>"."<b>Meal price/day</b>"."</td>";
                            echo"<td>"."<b>Pool price</b>"."</td>";
                            echo"<td>"."<b>Gym price</b>"."</td>";

                            echo "</tr>";
                            foreach($query2 as $row){
                                echo "<tr style='background-color: #749be8'>";
                                echo "<td>".$row['meal_price']." &euro;</td>";
                                echo "<td>".$row['pool_price']." &euro;</td>";
                                echo "<td>".$row['gym_price']." &euro;</td>";
                            }
                        }
                        ?>
                    </table>
                    <h5 class="text-center col-12 text-warning"> The pool and gym can be used whole time. </h5>
                    <h5 class="text-center col-12 text-danger"> Meal includes breakfast, lunch and dinner </h5>
                </div>

                    <?php
                    $r = "";

                    if (isset($_GET["r"])) {
                        $r = $_GET["r"];
                        $message_r='';
                        switch ($r) {
                            case "0" :
                                $message_r="You booked the room!";
                                break;
                            case "1" :
                                $message_r="You did not book the room!";
                                break;
                            case "2" :
                                $message_r="Invalid dates!";
                                break;
                            case "3" :
                                $message_r="You deleted the room!";
                                break;
                            case "4" :
                                $message_r="You did not delete!";
                                break;
                            case "5" :
                                $message_r="you cannot cancel 10 days before arrival!";
                                break;
                            case "6" :
                                $message_r="You updated the book!";
                                break;
                            case "7" :
                                $message_r="You did not update the book!";
                                break;
                        }
                        echo "<script type='text/javascript'>alert('$message_r');</script>";
                    }
                    ?>
                    <?php

                    if(isset($_POST['add']))
                    {
                        $today= date('Y-m-d');
                      echo'<div class="table-responsive ">';
                      echo '<h4 class="text-center mb-4">Room details</h4>';
                      echo '<table class=" table mx-auto col-md-7 col-sm-12 text-center ">
                      <tr style="background-color: #bcd3f1">  
                      <th>Price</th>
                      <th>Type</th>
                      <th>Discount</th>      
                      </tr>';
                      $id=$_SESSION['room_id'];
                      $discount=$_SESSION['discount'];
                      $price=$_SESSION['room_price'];
                      $type=$_SESSION['room_type'];

                      echo '<tr class="text-center" style="background-color: rgba(65,129,208,0.67)">';
                      echo '<td>'.$price.' &euro;</td>';
                      echo '<td>'.$type.'</td>';
                      echo '<td>'.$discount.'%</td>';
                      echo'</tr>';
                      echo' </table>';
                      echo' </div>';


                      echo'<div class="col-md-8 col-sm-12 mx-auto book">';
                      echo'<h4 class="text-center"> If you want the book the room, fill the fields!</h4>';
                      echo'<form class="form  col-12  mx-auto" action="book_room.php" method="post">';
                      echo'<label class=" col-md-3 col-sm-12"><b>Identity card</b></label><input class=" col-md-6 col-sm-12 form-control" required type="text" name="identity" placeholder="Identity number..."><br>';
                      echo'<label class=" col-md-3 col-sm-12"><b>Phone</b></label><input class="col-md-6 col-sm-12 " type="tel" required name="phone" placeholder="Phone number..."><br>';
                      echo'<label class="col-md-3 col-sm-12"><b>Country</b></label><input class="col-md-6 col-sm-12 form-control" required type="text" name="country" placeholder="Country..."><br>';
                      echo'<label class="col-md-3 col-sm-12"><b>City</b></label><input class="col-md-6 col-sm-12 form-control" required type="text" name="city" placeholder="City..."><br>';
                      echo'<label class="col-md-3 col-sm-12"><b>Address</b></label><input class="col-md-6 col-sm-12 form-control" required type="text" name="address" placeholder="Address.."><br>';
                      echo'<br>';
                      echo'<hr>';
                      echo'<div class="row form-group mx-auto">';
                      echo'<div class="col-12 mx-auto ">';
                      echo' <label class="op "><b>Payment</b></label><br>';
                      echo' <input type="radio" id="card" name="payment" value="card" required checked="checked">
                            <label for="card">Card</label><br>
                            <input type="radio" id="cash" name="payment" value="cash">
                            <label for="radio">Cash</label><br>
                            </div>';
                      echo'</div>';
                      echo'<hr>';
                      echo'<div class="row">';
                      echo'<div class="col-md-6 col-sm-12  ">
                           <label class="op "><b>Arrival date</b></label>
                           <input type="date" name="arrival_date" required value="' . $today . '"  min="' . $today . '" max="2021-10-01">';
                      echo'</div><br>';
                      echo'<div class="col-md-6 col-sm-12">
                           <label class="op"><b>Deparature date</b></label>
                           <input type="date" name="deparature_date" required  value="' . $today . '" max="2021-10-01" min="' . $today . '" >';
                      echo'</div>';
                        echo'</div>';
                        echo'<hr>';
                        echo'<label class=" col-md-6 col-sm-12"><b>Number of person to eat</b></label><input class=" col-md-3 col-sm-12" min="0" value="0" required type="number" name="meal_person"><br>';
                        echo'<label class=" col-md-6 col-sm-12"><b>Number of person to swimmingpool</b></label><input class="col-md-3 col-sm-12 " min="0" required type="number" value="0" name="pool_person"><br>';
                        echo'<label class=" col-md-6 col-sm-12"><b>Number of person to gym</b></label><input class="col-md-3 col-sm-12 " min="0" required type="number" value="0" name="gym_person"><br>';
                        echo'<hr>';
                        echo'<div class="row form-group mx-auto">';
                        echo'<div class="col-md-4 col-sm-12 mx-auto">';
                        echo'<label class="op"><b>Meals</b></label><br>';
                        echo'<input type="radio" name="meal"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="meal"  id="no" checked value="no"><label for="no">No</label><br>';
                        echo'</div>';
                        echo'<div class="col-md-4 col-sm-12 mx-auto">';
                        echo'<label class="op"><b>Pool</b></label><br>';
                        echo'<input type="radio" name="pool"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="pool"  id="no" checked value="no"><label for="no">No</label><br>';
                        echo'</div>';
                        echo'<hr>';
                        echo'<div class="col-md-4 col-sm-12 mx-auto">';
                        echo'<label class="op"><b>Gym</b></label><br>';
                        echo'<input type="radio" name="gym"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="gym"  id="no" checked value="no"><label for="no">No</label><br>';
                        echo'</div>';
                        echo'</div>';
                        echo'<hr>';
                        echo '<div class="row mx-auto">';
                        echo '<div class="col-12">';
                        echo'<input type="submit" name="book" class="send btn btn-success col-5" value="Book">' ;
                        echo '<input type="reset"  class="send btn btn-danger col-5 float-right" value="Reset">';
                        echo'</form>';
                        echo "</div>";
                        echo '</div>';
                    }
                    ?>

                <?php
                $sql="SELECT * FROM book where id_user=".$_SESSION['id_user'];
                $query2=mysqli_query($connection,$sql);
                if(mysqli_num_rows($query2)!=0) {
                    echo'<div class="row col-12 mx-auto">';
                    foreach($query2 as $row) {
                        echo '<div class="card col-md-4 col-12  mx-auto  text-center  mb-5" style="height: 400px; overflow-y: auto">
                             <div class="card-header"><h4>Booked room</h4> </div>
                              <ul class="list-group list-group-flush text-center ml-3">
                              <li class="list-group-item"><b>Room id: </b>' . $row['room_id'] . '</li>
                              <li class="list-group-item"><b>Arrival date: </b>' . $row['arrival_date'] . '</li>
                              <li class="list-group-item"><b>Deparature date:</b>' . $row['deparature_date'] . '</li>
                              <li class="list-group-item"><b>Identity card: </b>' . $row['identity_card'] . '</li>
                              <li class="list-group-item"><b>Phone: </b>' . $row['phone'] . '</li>
                              <li class="list-group-item"><b>Payement: </b>' . $row['payment'] . '</li>
                              <li class="list-group-item"><b>Meal: </b>' . $row['meal'] . '</li>
                              <li class="list-group-item"><b>Gym: </b>' . $row['gym'] . '</li>
                              <li class="list-group-item"><b>Pool: </b>' . $row['pool'] . '</li>
                              <li class="list-group-item"><b>Gym person: </b>' . $row['gym_person'] . '</li>
                              <li class="list-group-item"><b>Meal person: </b>' . $row['meal_person'] . '</li>
                              <li class="list-group-item"><b>Pool person: </b>' . $row['pool_person'] . '</li>
                              <li class="list-group-item bg-success text-white"><b>Room price: </b>' . $row['price'] . '&euro;</li>
                              <li class="list-group-item bg-primary text-white"><b>Services price: </b>' . $row['services_price'] . '&euro;</li>';
                            $whole=$row['price']+$row['services_price'];
                            echo '<li class="list-group-item bg-danger text-white"><b>Whole price: </b>' .$whole . '&euro;</li>';

                        echo '</ul>';
                        echo "<form action='delete.php' method='POST'><input type='hidden' name='delete3' value='" . $row['book_id'] . "'><button type='submit' style='background-color: #ff0000;' class='col-12 mb-4 btn-danger' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>Delete</span></button></form>";
                        echo "<form action='booking.php' method='POST'><input type='hidden' name='update' value='" . $row['book_id'] . "'><button type='submit' style='background-color: #007bff;' class='col-12 mb-4 text-white'><span>Update</span></button></form>";
                        echo '</div>';

                    }
                    echo '</div>';
                }

                ?>
                <?php
                if (isset($_POST['update'])) {
                    $today= date('Y-m-d');
                    $sql = "SELECT * FROM book WHERE book_id= " . $_POST['update'];
                    $myData = mysqli_query($connection, $sql);
                    if ($myData) {
                        foreach ($myData as $row) {
                            echo'<div class="col-md-8 col-sm-12 mx-auto book mb-4">';
                            echo'<h4 class="text-center"> If you want the update the room, fill the fields!</h4>';
                            echo'<form class="form  col-12  mx-auto" action="update_book.php" method="post">';
                            echo"<label class=' col-md-3 col-sm-12'><b>Identity card</b></label><input class=' col-md-6 col-sm-12 form-control' required type='text' name='identity'  placeholder='Identity number...' value='".$row['identity_card']."'><br>";
                            echo"<label class=' col-md-3 col-sm-12'><b>Phone</b></label><input class=' col-md-6 col-sm-12' required type='tel' name='phone'  placeholder='Phone number...' value='".$row['phone']."'><br>";
                            echo"<label class=' col-md-3 col-sm-12'><b>Country</b></label><input class=' col-md-6 col-sm-12 form-control' required type='text' name='country'  placeholder='Country...' value='".$row['country']."'><br>";
                            echo"<label class=' col-md-3 col-sm-12'><b>City</b></label><input class=' col-md-6 col-sm-12 form-control' required type='text' name='city'  placeholder='City...' value='".$row['city']."'><br>";
                            echo"<label class=' col-md-3 col-sm-12'><b>Address</b></label><input class=' col-md-6 col-sm-12 form-control' required type='text' name='address'  placeholder='Address...' value='".$row['address']."'><br>";
                            echo'<br>';
                            echo'<hr>';
                            echo'<div class="row form-group mx-auto">';
                            echo'<div class="col-12 mx-auto ">';
                            echo' <label class="op "><b>Payment</b></label><br>';
                            echo' <input type="radio" id="card" name="payment" value="card" required checked="checked">
                            <label for="card">Card</label><br>
                            <input type="radio" id="cash" name="payment" value="cash">
                            <label for="radio">Cash</label><br>
                            </div>';
                            echo'</div>';
                            echo'<hr>';
                            echo'<div class="row">';
                            echo"<div class='col-md-6 col-sm-12'>
                           <label class='op'><b>Arrival date</b></label>
                           <input type='date' name='arrival_date' required   min='".$today."' max='2021-10-01'  value='".$row['arrival_date']."'>";


                            echo'</div><br>';
                            echo"<div class='col-md-6 col-sm-12'>
                           <label class='op'><b>Deparature date</b></label>
                           <input type='date' name='deparature_date' required  max='2021-10-01'  min='".$today."'  value='".$row['deparature_date']."'  >";
                            echo'</div>';
                            echo'</div>';
                            echo'<hr>';
                            echo"<label class='col-md-6 col-sm-12'><b>Number of person to eat</b></label><input class='col-md-3 col-sm-12' min='0'  value='".$row['meal_person']."' required type='number' name='meal_person'><br>";
                            echo"<label class='col-md-6 col-sm-12'><b>Number of person to swimminpool</b></label><input class='col-md-3 col-sm-12' min='0'  value='".$row['pool_person']."' required type='number' name='pool_person'><br>";
                            echo"<label class='col-md-6 col-sm-12'><b>Number of person to gym</b></label><input class='col-md-3 col-sm-12' min='0'  value='".$row['gym_person']."' required type='number' name='gym_person'><br>";
                            echo'<hr>';
                            echo'<div class="row form-group mx-auto">';
                            echo'<div class="col-md-4 col-sm-12 mx-auto">';
                            echo'<label class="op"><b>Meals</b></label><br>';
                            echo'<input type="radio" name="meal"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="meal"  id="no" checked value="no"><label for="no">No</label><br>';
                            echo'</div>';
                            echo'<div class="col-md-4 col-sm-12 mx-auto">';
                            echo'<label class="op"><b>Pool</b></label><br>';
                            echo'<input type="radio" name="pool"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="pool"  id="no" checked value="no"><label for="no">No</label><br>';
                            echo'</div>';
                            echo'<hr>';
                            echo'<div class="col-md-4 col-sm-12 mx-auto">';
                            echo'<label class="op"><b>Gym</b></label><br>';
                            echo'<input type="radio" name="gym"  id="yes"  value="yes"><label for="yes">Yes</label><br>
                     <input type="radio" name="gym"  id="no" checked value="no"><label for="no">No</label><br>';
                            echo'</div>';
                            echo '<input type="hidden" name="book_id" value="'.$_POST['update'].'">';
                            echo '<input type="hidden" name="room_id" value="'.$row['room_id'].'">';
                            echo '<input type="hidden" name="price" value="'.$row['price'].'">';
                            echo'</div>';
                            echo'<hr>';
                            echo '<div class="row mx-auto">';
                            echo '<div class="col-12">';
                            echo'<input type="submit" name="book" class="send btn btn-success col-5" value="Update">' ;
                            echo '<input type="reset"  class="send btn btn-danger col-5 float-right" value="Reset">';
                            echo'</form>';
                            echo "</div>";
                            echo '</div>';

                        }
                    }
                }
                ?>

        </div>
    </div>





</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
