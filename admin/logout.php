<?php
session_start();
include('C:\xampp\htdocs\hotel\db_config2.php');
$login=$_COOKIE['llogin'];
$sql = "UPDATE admin SET  last_logout=now(), last_login='".$login."' where admin_id=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
header('Location:index.php');
exit();
?>