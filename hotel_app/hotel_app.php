
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel</title>
    <link href="iiiiii.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/hotel/style.css"  rel="stylesheet" type="text/css">
<style>
    h5{
        color: #5a5858;
        text-align: center;
    }
</style>
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
            <li class="nav-item navbar-right ">
                <a class="nav-link "  href="circular.php">Sending a circular</a>
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
            <li class="nav-item navbar-right">
                <a class="nav-link " href="hotel_app.php">Hotel app services </a>
            </li>
            <li class="nav-item navbar-right">
                <a class="nav-link " href="hotel_app_users.php">Hotel app users </a>
            </li>
        </ul>
        <a class="navbar-brand" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>

</nav>
<div class="content mx-auto col-12 col-sm-12 col-md-10 col-lg-10 m-2"  style="margin-bottom: 5%;" >
    <h1 class="text-center">Hotel app services</h1><br>
    <?php
    include('config_hotel_app.php');
    $sql = "SELECT * FROM services;";

    $result = $connection->query($sql);

    if ($result->num_rows > 0){
        echo '<div class="row col-12">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card col-10 col-sm-8 m-2 col-md-3 mx-auto  ">';
            echo '<div class="card-block mx-auto">';
            echo '<h4 class="card-title">Id: '. $row['id_order'].'</h4>';
            echo '<hr>';
            echo '<h5>Room: '. $row['room'].'</h5>';
            echo '<hr>';
            echo '<h5> Dates: '. $row['dates'].'</h5>';
            echo '<hr>';
            echo '<h5> Status: '. $row['status'].'</h5>';
            echo '<hr>';
            echo '<h5 class="mb-4"> Text:<br>' .$row['order_data'].'</h5>';
            echo '<hr>';

            echo "<form action='delete_hotel_app.php' method='POST'><input type='hidden' name='delete4' value='".$row['id_order']."'><button type='submit'class='col-5 btn btn-danger float-right mb-4' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>Delete</span></button></form>";
            echo"<form action='hotel_app.php' method='POST'><input type='hidden' name='update'  value='".$row['id_order']."'><button type='submit' class='rep col-5 btn btn-success mb-4'>Update</button></form>";
            echo '</div>';
            echo '</div>';

        }
        echo '</div>';
    }

    $d = "";
    if (isset($_GET["d"])) {
        $d = $_GET["d"];
        $message_d = '';
        switch ($d) {
            case "0" :
                $message_d = "You delete the message!";
                break;
            case "1" :
                $message_d = "You did not delete the message!";
                break;
            case "2" :
                $message_d = "Updated the item!";
                break;
            case "3" :
                $message_d = " Did not update the item!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_d');</script>";
    }
    ?>
    <?php if(isset($_POST['update']))
    {
        $sql = "SELECT * FROM services WHERE id_order= ".$_POST['update'];
        $myData = mysqli_query($connection, $sql);
        if($myData)
        {
            foreach($myData as $row)
            {

                echo "<form action='hotel_app_update.php' method='post' class='update5 mx-auto col-12 col-sm-7 col-md-7 col-lg-4'>";
                echo "<div class='form col-12 col-sm-12 col-md-12 col-lg-12'>";
                echo "<h4>Update the selected item</h4>";
                echo "<label>Id</label><input type='number' name='id_order' value='".$row['id_order']."'>"."<br>";
                echo "<label>Room</label><input type='number' name='room' value='".$row['room']."'>"."<br>";
                echo "<label for='status'>Status</label>";
               echo'<select name="status" class="op mb-2">
                    <option value="none" class="op">Select an option</option>
                    <option value="progress" class="op">Progress</option>
                    <option value="finished" class="op">Finished</option>
                    <option value="error" class="op">Error</option>
                     </select>';
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo'<input type="submit" class="send btn btn-success" value="Update">' ;
                echo "</div>";
                echo '<div class="col-6">';
                echo '<input type="reset"  class="send btn btn-danger" value="Reset">';
                echo "</div>";

                echo "<input type='hidden' value='".$row['id_order']."' name='update'>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }
        }
    }?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
