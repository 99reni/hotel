<?php
include "db_config.php";
$data="";
$room="";
if (isset($_POST['room'])) {
    $room = strip_tags(trim($_POST['room']));
}

if (isset($_POST['data'])) {
    $data = strip_tags(trim($_POST['data']));
}
if (!empty($room) and !empty($data)) {

    $room = urldecode(strip_tags(trim($_POST['room'])));
    $data = urldecode(strip_tags(trim($_POST['data'])));
    insertIntoDevice($data,$room);

}
function insertIntoDevice($data,$room)
{

    global $connection;

    $sql = "INSERT INTO services (order_data,room,dates) 
            VALUES ('$data','$room', now())";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_insert_id($connection);

}
