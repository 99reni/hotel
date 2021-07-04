<?php
include "db_config.php";
header('Content-Type: application/json');
$username="";
$password="";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));
}
if (!empty($username) && !empty($password)) {

    $username = urldecode(strip_tags(trim($_POST['username'])));
    $password = urldecode(strip_tags(trim($_POST['password'])));
    global $connection;
    $sql = "SELECT id FROM users 
            WHERE username = '$username'
            AND password = MD5('$password')";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        echo 'Ok';
    }
    else{
        echo 'Invalid username or password!';
    }


}



?>