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
    <table class="table mx-auto mt-auto table-responsive-sm table-responsive-md col-lg-12 " >
        <?php
        include('C:\xampp\htdocs\hotel\db_config2.php');
        $query2=mysqli_query($connection,"SELECT * FROM room where room_type='single'");
        if(mysqli_num_rows($query2)!=0) {
            echo "<tr style='background-color: #fdca9e;'>";
            echo"<td style='width: 150px;'>"."Image"."</td>";
            echo"<td>"."Id"."</td>";
            echo"<td>"."Category"."</td>";
            echo"<td>"."Price"."</td>";
            echo"<td>"."Discount"."</td>";
            echo"<td>"."Free rooms"."</td>";
            echo "<td colspan='3' style='width: 100px;'>"."Actions"."</td>";

            echo "</tr>";
            foreach($query2 as $row){
                echo "<tr style='background-color: #eab6b4'>";
                echo"<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $row['room_image'] ).'" alt="single room"  class="img-responsive img-fluid">'."</td>";
                echo"<td>".$row['room_id']."</td>";
                echo"<td>".$row['room_type']."</td>";
                echo "<td>".$row['room_price']." &euro;</td>";
                echo "<td>".$row['discount'].'%'."</td>";
                echo "<td>".$row['free_room']."</td>";
                echo "<td><form action='delete.php' method='POST'><input type='hidden' name='delete' value='".$row['room_id']."'><button type='submit'class='btn btn-danger' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>DELETE</span></button></form></td>";
                echo "<td><form action='single.php' method='POST'><input type='hidden'  name='upload' value='".$row['room_id']."'><input type='submit' value='IMAGE' class='btn btn-success'></form></td>";
                echo "<td><form action='single.php' method='POST'><input type='hidden'  name='update' value='".$row['room_id']."'><input type='submit' value='UPDATE' class='btn btn-primary'></form></td></tr>";
            }
        }
        ?>
    </table>
    <?php
    $d = "";

    if (isset($_GET["d"])) {
        $d = $_GET["d"];
        $message_d='';
        switch ($d) {
            case "0" :
                $message_d="You deleted the room!";
                break;
            case "1" :
                $message_d="You did not delete the room!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_d');</script>";
    }
    ?>
    <br>
    <?php
    $u = "";

    if (isset($_GET["u"])) {
        $u = $_GET["u"];
        $message_u='';
        switch ($u) {
            case "0" :
                $message_u="You updated the room!";
                break;
            case "1" :
                $message_u="You did not update the room!";
                break;
            case "2" :
                $message_u="Something went wrong!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_u');</script>";
    }
    ?>
    <br>


    <?php if(isset($_POST['update']))
    {
        $sql = "SELECT * FROM room WHERE room_id= ".$_POST['update'];
        $myData = mysqli_query($connection, $sql);
        if($myData)
        {
            foreach($myData as $row)
            {

                echo "<form action='update.php' method='post' class='update5 mx-auto col-12 col-sm-7 col-md-7 col-lg-4'>";
                echo "<div class='form col-12 col-sm-12 col-md-12 col-lg-12'>";
                echo "<h4>Update the selected item</h4>";
                echo "<label>Id</label><input type='number' name='room_id' value='".$row['room_id']."'>"."<br>";
                echo "<label>Category</label><input type='text' name='room_type' value='".$row['room_type']."'>"."<br>";
                echo "<label>Price</label><input type='number' name='room_price' value='".$row['room_price']."'>"."<br>";
                echo "<label for='discount'>Discount</label>";
                echo '<select name="discount" class="op1">';
                echo '<option value="none" class="op1">Select an option</option>';
                echo' <option value="0" class="op1">0</option>
                      <option value="10" class="op1">10</option>
                      <option value="20" class="op1">20</option>
                      <option value="50" class="op1">50</option>
                       </select>';
                echo "<label>Free room</label><input type='number' name='free_room' value='".$row['free_room']."'>"."<br>"."<br>";
                echo '<div class="row">';
                        echo '<div class="col-6">';
                             echo'<input type="submit" class="send btn btn-success" value="Update">' ;
                        echo "</div>";
                        echo '<div class="col-6">';
                             echo '<input type="reset"  class="send btn btn-danger" value="Reset">';
                         echo "</div>";
                echo "</div>";
                echo "<input type='hidden' value='".$row['room_id']."' name='update'>";
                echo "</div>";
                echo "</form>";
            }
        }
    }?>
    <?php
    $i = "";
    if (isset($_GET["i"])) {
        $i = $_GET["i"];
        $message_i = '';
        switch ($i) {
            case "0" :
                $message_i = "You upload a image!";
                break;
            case "1" :
                $message_i = "You did not upload image!";
                break;
            case "2" :
                $message_i = "Choose a image!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_i');</script>";
    }
    ?>
    <?php
    if(isset($_POST['upload']))
    {
        $image=$_POST['upload'];



                echo "<form action='upload.php' method='post' enctype='multipart/form-data' class='upload mx-auto col-12 col-sm-7 col-md-7 col-lg-4'>";
                echo"<div class='form col-12 col-sm-12 col-md-12 col-lg-12'>";
                echo"<h4>Upload a image</h4>";
                echo'<input type="file" name="image" required>';
                echo "<br>";
                echo "<br>";
                echo "<input type='hidden' value='".$row['room_id']."' name='upload'>";
                echo '<input type="submit" name="submit" class="btn btn-secondary" value="Upload">';
                echo "</div>";
                echo "</form>";


    }
    ?>

        <?php

        $l = "";

        if (isset($_GET["l"])) {
            $l = $_GET["l"];
            $message='';
            switch ($l) {
                case "0" :
                    $message="You added a new room!";
                    break;
                case "1" :
                    $message="You did not add a new room!";
                    break;
                case "2" :
                    $message="You need to fill the all fields!";
                    break;
                case "3" :
                    $message="Something went wrong!";
                    break;
            }
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        ?>

    <form action="insert.php" method="post"  class="insert mx-auto col-12 col-sm-7 col-md-7 col-lg-4">
        <div class="form col-12 col-sm-12 col-md-12 col-lg-12">
        <h4>Add a new room</h4>
        <label>Id</label><br><input type="number" name="room_id"><br>
            <label for="room_type">Category</label>
            <select name="room_type" class="op">
                <option value="none" class="op">Select an option</option>
                <option value="single" class="op">single</option>
                <option value="double" class="op">double</option>
                <option value="multiple" class="op">multiple</option>
            </select>
        <label>Price</label><br><input  type="number" name="room_price"><br>
        <label for="discount">Discount</label>
        <select name="discount" class="op1">
                <option value="none" class="op1">Select an option</option>
                <option value="0" class="op1">0</option>
                <option value="10" class="op1">10</option>
                <option value="20" class="op1">20</option>
                <option value="50" class="op1">50</option>
        </select>
         <label>Free rooms</label><br><input type="number" name="free_room"><br><br>
            <div class="row">
                <div class="col-6">
                    <input type="submit" class="send btn btn-success" value="Send">
                </div>
                <div class="col-6">
                    <input type="reset"  class="send btn btn-danger" value="Reset">
                </div>
            </div>
        </div>
    </form>

</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
