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
            h1 {
                font-size:16px;
            }

        }


        @media (min-width: 768px) {
            h1 {font-size:32px;}
        }
    </style>


    <link href="iiiiii.css" rel="stylesheet" type="text/css">
    <link href="/hotel/style.css"  rel="stylesheet" type="text/css">


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"  href="welcomeadmin.php"><i class="fa fa-hotel"></i> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="welcomeadmin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Rooms setting
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="single.php">Single room</a>
                    <a class="dropdown-item" href="double.php">Double room</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="multiple.php">Multiple room</a>
                </div>
            </li>
            <li class="nav-item navbar-right ">
                <a class="nav-link "  href="user.php">Users setting</a>
            </li>
            <li class="nav-item navbar-right">
                <a class="nav-link " href="circular.php">Sending a circular </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Messages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="contact_message.php">Contact messages</a>
                    <a class="dropdown-item" href="user_message.php">User rating/messages</a>
                </div>
            </li>
            <li class="nav-item navbar-right">
                <a class="nav-link " href="price.php">Price/Book </a>
            </li>
        </ul>
        <a class="navbar-brand" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>

</nav>
<div class="content mx-auto col-12 col-sm-12 col-md-10 col-lg-10" style="margin-bottom: 5%;" >
    <table class="table mx-auto mt-auto table-responsive-sm table-responsive-md col-lg-4 col-12 col-sm-11 col-md-4 " >
        <?php
        include('C:\xampp\htdocs\hotel\db_config2.php');
        $query2=mysqli_query($connection,"SELECT * FROM price");
        if(mysqli_num_rows($query2)!=0) {
            echo "<tr style='background-color: #fdca9e;'>";
            echo"<td>"."Meal price"."</td>";
            echo"<td>"."Pool price"."</td>";
            echo"<td>"."Gym price"."</td>";
            echo"<td>"."Action"."</td>";
            echo "</tr>";
            foreach($query2 as $row){
                echo "<tr style='background-color: #eab6b4'>";
                echo "<td>".$row['meal_price']." &euro;</td>";
                echo "<td>".$row['pool_price']." &euro;</td>";
                echo "<td>".$row['gym_price']." &euro;</td>";
                echo "<td><form action='price.php' method='POST'><input type='hidden'  name='update'><input type='submit' value='UPDATE' class='btn btn-primary'></form></td></tr>";
            }
        }
        ?>
    </table>

    <br>


    <?php if(isset($_POST['update']))
    {
        $sql = "SELECT * FROM price";
        $myData = mysqli_query($connection, $sql);
        if($myData)
        {
            foreach($myData as $row)
            {

                echo "<form action='price_update.php' method='post' class='update5 mx-auto col-12 col-sm-7 col-md-7 col-lg-4'>";
                echo "<div class='form col-12 col-sm-12 col-md-12 col-lg-12'>";
                echo "<h4>Update the prices</h4>";
                echo "<label>Meal price</label><input type='number' name='meal_price' value='".$row['meal_price']."'>"."<br>";
                echo "<label>Pool price</label><input type='number' name='pool_price' value='".$row['pool_price']."'>"."<br>";
                echo "<label>Gym price</label><input type='number' name='gym_price' value='".$row['gym_price']."'>"."<br>"."<br>";
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo'<input type="submit" class="send btn btn-success" value="Update">' ;
                echo "</div>";
                echo '<div class="col-6">';
                echo '<input type="reset"  class="send btn btn-danger" value="Reset">';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }
        }
    }?>


<?php
$u = "";

if (isset($_GET["u"])) {
    $u = $_GET["u"];
    $message_u = '';
    switch ($u) {
        case "0" :
            $message_u = "You updated the price!";
            break;
        case "1" :
            $message_u = "You did not update the price";
            break;
       case "2" :
            $message_u = "Something went wrong";
            break;
        case "3" :
            $message_u = "You deleted!";
            break;
        case "4" :
            $message_u = "You did not deleted!";
            break;

    }
    echo "<script type='text/javascript'>alert('$message_u');</script>";
}
?>
    <?php
    $sql3="SELECT * FROM book";
    $query2=mysqli_query($connection,$sql3);
    if(mysqli_num_rows($query2)!=0) {
        echo'<div class="row col-12 mx-auto">';
        foreach($query2 as $row) {
            echo '<div class="card col-md-4 col-12  mx-auto  text-center   mb-5" style="height: 400px; overflow-y: auto">
                             <div class="card-header"><h4>Booked room</h4> </div>
                              <ul class="list-group list-group-flush text-dark ml-3">
                              <li class="list-group-item"><b>Room id: </b>' . $row['room_id'] . '</li>
                              <li class="list-group-item"><b>Room id: </b>' . $row['id_user'] . '</li>                  
                              <li class="list-group-item"><b>Arrival date: </b>' . $row['arrival_date'] . '</li>
                              <li class="list-group-item"><b>Deparature date:</b>' . $row['deparature_date'] . '</li>
                              <li class="list-group-item"><b>Identity card: </b>' . $row['identity_card'] . '</li>
                              <li class="list-group-item"><b>Phone: </b>' . $row['phone'] . '</li>
                              <li class="list-group-item"><b>Phone: </b>' . $row['country'] . '</li>
                              <li class="list-group-item"><b>Phone: </b>' . $row['city'] . '</li>
                              <li class="list-group-item"><b>Phone: </b>' . $row['country'] . '</li>
                              <li class="list-group-item"><b>Payement: </b>' . $row['address'] . '</li>
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
            echo "<form action='delete2.php' method='POST'><input type='hidden' name='delete' value='" . $row['book_id'] . "'><button type='submit'  class='col-md-6 col-12 mb-4 mt-3 btn btn-danger' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>Delete</span></button></form>";
            echo '</div>';

        }

    }

    ?>



</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>

