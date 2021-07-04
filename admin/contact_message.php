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
        </ul>
        <a class="navbar-brand" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>

</nav>
<div class="content mx-auto col-12 col-sm-12 col-md-10 col-lg-10" style="margin-bottom: 5%;" >
    <h1 class="text-center">Contact messages</h1><br>
    <?php
    include('C:\xampp\htdocs\hotel\db_config2.php');
    $sql = "SELECT contact_id,name, phone, email,text,replied
                    FROM contact;";

    $result = $connection->query($sql);
    echo '<div class="row ok">';
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card col-10 col-sm-8  col-md-3 mx-auto mb-5 ">';
            echo '<div class="card-block">';
            echo '<h4 class="card-title">Name: '. $row['name'].'</h4>';
            echo '<hr>';
            echo '<h5>Email: '. $row['email'].'</h5>';
            echo '<hr>';
            echo '<h5> Phone: '. $row['phone'].'</h5>';
            echo '<hr>';
            echo '<p class="card-text mb-4"> Text:<br>' .$row['text'].'</p>';
            echo '<hr>';

            echo "<form action='delete2.php' method='POST'><input type='hidden' name='delete2' value='".$row['contact_id']."'><button type='submit'class='col-5 btn btn-danger float-right mb-4' onclick=\"if (!confirm('Are you sure?')) { return false }\"><span>Delete</span></button></form>";
            echo"<form action='contact_message.php' method='POST'><input type='hidden' name='reply'  value='".$row['contact_id']."'><button type='submit' class='rep col-5 btn btn-success mb-4'>Reply</button></form>";
            if($row['replied']==1){
                echo '<div class="replied mx-auto col-5  text-center  bg-warning text-dark">Replied</div>';}
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</div>';
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
        }
        echo "<script type='text/javascript'>alert('$message_d');</script>";
    }
    $r = "";
    if (isset($_GET["r"])) {
        $r = $_GET["r"];
        $message_r = '';
        switch ($r) {
            case "0" :
                $message_r = "You replied!";
                break;
            case "1" :
                $message_r = "You did not reply!";
                break;
        }
        echo "<script type='text/javascript'>alert('$message_r');</script>";
    }
    ?>
    <?php
    if(isset($_POST['reply'])) {

        $sql = "SELECT * FROM contact WHERE contact_id= " . $_POST['reply'];
        $myData = mysqli_query($connection, $sql);
        if ($myData) {
            foreach ($myData as $row) {
                echo "<form action='reply.php' method='post' class='reply mx-auto col-12 col-sm-7 col-md-8 col-lg-4' autofocus='autofocus' >";
                echo "<div class='form col-12 col-sm-12 col-md-12 col-lg-12'>";
                echo "<h4>Reply</h4>";
                echo "<h6>Name: " . $row['name'] . "</h6>";
                echo "<h6>Email: " . $row['email'] . "</h6>";
                echo "<h6>Text: " . $row['text'] . "</h6>";
                echo '<input class="form-control col-12" name="email" placeholder="email" required/><br>';
                echo '<input class="form-control col-12" name="subject" placeholder="Subject" required/><br>';
                echo '<textarea class="form-control" name="text" placeholder="Letter content" required></textarea><br>';
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo '<input type="submit" class="send btn btn-success" value="Send">';
                echo "<input type='hidden' value='" . $row['contact_id'] . "' name='contact_id'>";
                echo "</div>";
                echo '<div class="col-6">';
                echo '<input type="reset"  class="send btn btn-danger" value="Reset">';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }
        }

    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
