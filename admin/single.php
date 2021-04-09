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
    <link href="/hotel/style.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">


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
                <a class="nav-link "  href="register.php">Users setting</a>
            </li>
            <li class="nav-item navbar-right">
                <a class="nav-link " href="login.php">Sending a circular </a>
            </li>
        </ul>

    </div>

</nav>
<div class="content mx-auto col-12 col-sm-12 col-md-10 col-lg-10" style="overflow-x:auto;" >
    <table class="table mx-auto mt-auto col-12 col-sm-12 col-md-8 col-lg-8" >
        <?php
        include('C:\xampp\htdocs\hotel\db_config2.php');
        $query2=mysqli_query($connection,"SELECT * FROM room where room_type='single'");
        if(mysqli_num_rows($query2)!=0) {
            echo "<tr style='background-color: #fdca9e;'>";
            echo"<td>"."Id"."</td>";
            echo"<td>"."Category"."</td>";
            echo"<td>"."Price"."</td>";
            echo"<td>"."Free rooms"."</td>";
            echo "<td colspan='2' style='width: 200px;'>"."Actions"."</td>";
            echo "</tr>";
            foreach($query2 as $row){
                echo "<tr style='background-color: #eab6b4'>";
                echo"<td>".$row['room_id']."</td>";
                echo"<td >".$row['room_type']."</td>";
                echo "<td>".$row['room_price']." RSD</td>";
                echo "<td>".$row['free_room']."</td>";
                echo "<td><form action='delete.php' method='POST'><input type='hidden' name='delete' value='".$row['room_id']."'><input type='submit' value='DELETE' class='button'></form></td>";
                echo "<td><form action='index.php' method='POST'><input type='hidden'  name='update' value='".$row['room_id']."'><input type='submit' value='UPDATE' class='button'></form></td></tr>";
            }
        }
        ?>
    </table>
    <br>
    <br>

    <?php if(isset($_POST['update']))
    {
        $sql = "SELECT * FROM room WHERE room_id= ".$_POST['update'];
        $myData = mysqli_query($connection, $sql);
        if($myData)
        {
            foreach($myData as $row)
            {
                echo"<h4 style=' padding-left: 10%; padding-top: 3%;'>A kiválasztott elem módosítása</h4>";
                echo "<form action='updateset.php' method='post' id='second'>";
                echo "<label>Id: </label><input type='number' name='room_id' value='".$row['room_id']."'>"."<br>";;
                echo "<label>Kategória: </label><input type='text' name='room_type' value='".$row['room_type']."'>"."<br>";
                echo "<label>Ár: </label><input type='number' name='room_price' value='".$row['room_price']."'>"."<br>";
                echo "<label>Raktáron: </label><input type='number' name='free_room' value='".$row['free_room']."'>"."<br>";
                echo "<input type='submit' value='Mentés' style='width:70px; height: 25px;'>";
                echo "<input type='hidden' value='".$row['room_id']."' name='modosit'>";
                echo "</form>";
            }
        }
    }?>

    <form action="insert.php" method="post"  class="insert mx-auto mt-auto col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="form  mt-auto col-12 col-sm-12 col-md-12 col-lg-12">
        <h4>Új elem hozzáadása</h4>
        <label>Id</label><br><input type="number" name="room_id"><br>
        <label>Category</label><br><input type="text" name="room_type"><br>
        <label>Price</label><br><input  type="number" name="room_price"><br>
        <label>Free rooms</label><br><input type="number" name="free_room"><br>
        <input type="submit"  value="Küldés" style="width:70px; height: 25px;" >
        </div>
    </form>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
