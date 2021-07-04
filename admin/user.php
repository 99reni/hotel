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
    <table class="table mx-auto mt-auto  table-responsive" >
    <?php

        include('C:\xampp\htdocs\hotel\db_config2.php');
        $query2=mysqli_query($connection,"SELECT * FROM users");
        if(mysqli_num_rows($query2)!=0) {
            echo "<tr style='background-color: #fdca9e;'>";;
            echo"<td>"."Id"."</td>";
            echo"<td>"."Username"."</td>";
            echo"<td>"."Firstname"."</td>";
            echo"<td>"."Lastname"."</td>";
            echo"<td>"."Email"."</td>";
            echo"<td>"."Password"."</td>";
            echo"<td>"."Active"."</td>";
            echo"<td>"."Registration date"."</td>";
            echo "<td colspan='2' style='width: 100px;'>"."Actions"."</td>";

            echo "</tr>";
            foreach($query2 as $row){
                echo "<tr style='background-color: #eab6b4'>";
                echo"<td>".$row['id_user']."</td>";
                echo"<td>".$row['username']."</td>";
                echo"<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['active']."</td>";
                echo "<td>".$row['registration_expires']."</td>";
                echo "<td><form action='delete.php' method='POST'><input type='hidden' name='delete_user' value='".$row['id_user']."'><button type='submit' class='btn btn-danger' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>DELETE</span></button></form></td>";
                echo "<td><form action='user.php' method='POST'><input type='hidden'  name='update' value='".$row['id_user']."'><input type='submit' value='UPDATE' class='btn btn-primary'></form></td></tr>";
            }
        }
        ?>
    </table>
    <?php
    $u = "";
    $insert="";

    if (isset($_GET["u"])) {
        $u = $_GET["u"];
        $message_u='';
        switch ($u) {
            case "0" :
                $message_u="You deleted the user!";
                break;
            case "1" :
                $message_u="You did not delete the user!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_u');</script>";
    }

    elseif (isset($_GET["insert"])) {
        $insert = $_GET["insert"];
        $message_insert='';
        switch ($insert) {
            case "0" :
                $message_insert="You insert a new user!";
                break;
            case "1" :
                $message_insert="You did not insert a new user!";
                break;
            case "2" :
                $message_insert="Exist user";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_insert');</script>";
    }
    ?>
    <form action="/hotel/web.php" method="post"  class="insert_user mx-auto col-8 col-sm-7 col-md-7 col-lg-4">
        <div class="form col-12 col-sm-12 col-md-12 col-lg-12">
            <h4>Add a new user</h4>
            <label>Username</label><br><input  type="text" name="username" required><br>
            <label>Firstname</label><br><input type="text" name="firstname" required><br>
            <label>Lastname</label><br><input type="text" name="lastname" required><br>
            <label>Email</label><br><input type="email" name="email" required><br>
            <label>Password</label><br><input type="password" name="password" required><br>
            <br>
            <div class="row">
                <div class="col-6">
                    <input type="submit" class="btn btn-success"    name="is" value="insert">
                </div>
                <div class="col-6">
                    <input type="reset" class="btn btn-danger" name="rd" value="cancel" >
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
