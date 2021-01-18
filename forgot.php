<?php
session_start();

include_once 'db_config2.php';
if(isset($_POST['submit']) and !empty($_POST['email']))
{
    $email = $_POST['email'];
    $result = mysqli_query($connection,"SELECT * FROM users where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
    $fetchemail=$row['email'];
    $password=$row['password'];
    if($email==$fetchemail) {
        $to = $email;
        $subject = "Password";
        $txt = "Your password is : $password.";
        $headers = "From: echo@gmail.com" . "\r\n" .
            "CC: somebodyelse@example.com";
        mail($to,$subject,$txt,$headers);
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