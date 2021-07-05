<?php
include('config_hotel_app.php');
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
if(isset($_POST['id_order']) && isset ($_POST['status']) && isset ($_POST['room'])) {
    $update = $_POST['update'];



    $sql = "UPDATE services SET  id_order='$_POST[id_order]',room='$_POST[room]',status='$_POST[status]' WHERE id_order='$update'";
    $myData = mysqli_query($connection, $sql);
    if($myData)
    {
        redirection('hotel_app.php?d=2');
    }
    else{
        redirection('hotel_app.php?d=3');
    }
}