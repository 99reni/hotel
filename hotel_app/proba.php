<?php
include "db_config.php";
$name="";
$email="";
$username="";
$phone="";
$password="";

if (isset($_POST['name']) && isset($_POST['email']) &&
    isset($_POST['phone']) && isset($_POST['username']) && isset($_POST['password'])) {
    $name = strip_tags(trim($_POST['name']));
    $email = strip_tags(trim($_POST['email']));
    $phone = strip_tags(trim($_POST['phone']));
    $username = strip_tags(trim($_POST['username']));
    $password=strip_tags(trim($_POST['password']));

}



if (!empty($name) && !empty($email) && !empty($phone) && !empty($username) && !empty($password)) {

    $name = urldecode(strip_tags(trim($_POST['name'])));
    $email = urldecode(strip_tags(trim($_POST['email'])));
    $phone = urldecode(strip_tags(trim($_POST['phone'])));
    $username = urldecode(strip_tags(trim($_POST['username'])));
    $password = urldecode(strip_tags(trim($_POST['password'])));
    $password1=md5($password);


    insertIntoDevice($name,$email,$phone,$username,$password1);

}
function insertIntoDevice($name,$email,$phone,$username,$password1)
{

    global $connection;

    $sql = "INSERT INTO users (name,email,phone,username,password,registration_date) 
            VALUES ('$name','$email','$phone','$username','$password1', now())";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_insert_id($connection);

}
?>