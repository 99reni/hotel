<?php
include('config_hotel_app.php');
function redirection(string $url)
{
    header("Location:$url");
    exit();
}
if(isset($_POST['delete4'])) {
    $delete = $_POST['delete4'];
    $sql3 = "DELETE FROM services WHERE id_order =".$delete;
    $myData = mysqli_query($connection, $sql3);
    if ($myData) {
        redirection('hotel_app.php?d=0');
    } else {
        redirection('hotel_app.php?d=1');
    }
}
if(isset($_POST['delete_user'])) {
    $delete = $_POST['delete_user'];
    $sql3 = "DELETE FROM users WHERE id =".$delete;
    $myData = mysqli_query($connection, $sql3);
    if ($myData) {
        redirection('hotel_app_users.php?u=0');
    } else {
        redirection('hotel_app_users.php?u=1');
    }
}
?>