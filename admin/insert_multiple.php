<?php

include('C:\xampp\htdocs\hotel\db_config2.php');

/**
 * Function redirects user to given url
 *
 * @param string $url
 */
function redirection(string $url)
{
    header("Location:$url");
    exit();
}


if  (empty($_POST['room_id']) or empty($_POST['room_price'])  or empty($_POST['room_type'])  or
    empty($_POST['free_room']))
{
    redirection('multiple.php?l=2');
}


if (isset($_POST['room_id']) &&  isset($_POST['room_type']) && isset($_POST['room_price']) && isset($_POST['discount']) &&
    isset($_POST['free_room']))
{
    $room_id = $_POST['room_id'];
    $room_type = $_POST['room_type'];
    $room_price = $_POST['room_price'];
    $discount=$_POST['discount'];
    $free_room = $_POST['free_room'];

        $sql = "INSERT INTO room (room_id,room_type,room_price,free_room,discount) VALUES('$room_id', '$room_type', '$room_price', '$free_room','$discount')";
        $myData = mysqli_query($connection, $sql);

        if ($myData) {redirection('multiple.php?l=0');}

        else {redirection('multiple.php?l=1');}


}
else {
    redirection('multiple.php?l=3');
}

?>