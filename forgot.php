<?php
session_start();
require_once "db_config2.php";
define("SALT1","wtSHSU890381IC4");
define("SALT2","4CITAcywut46a");

if(isset($_POST['submit']) and !empty($_POST['email']) and !empty($_POST['newpassword'])  )
{
    $email = $_POST['email'];
    $newpassword1=$_POST['newpassword'];
    $newpassword= SALT1 . "$newpassword1" . SALT2;


    $sql = "UPDATE users  SET password=MD5('$newpassword'),new_password_expires=now() where email='$email'";

    if(mysqli_query($connection, $sql))
    {

        header('Location: http://localhost/hotel/forgotpassword.php?l=1');

    }
    else{
        header('Location: http://localhost/hotel/forgotpassword.php?l=0');

    }
}
else{
    header('Location: http://localhost/hotel/forgotpassword.php?l=0');

}



?>