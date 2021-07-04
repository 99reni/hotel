<?php
include('C:\xampp\htdocs\hotel\db_config2.php');
function redirection(string $url)
{
    header("Location:$url");
    exit();
}
if ( isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['text']) && isset($_POST['contact_id'])  )
{
    $contactid=$_POST['contact_id'];
    $query2=mysqli_query($connection,"UPDATE guest_contact SET replied = '1' WHERE guest_contact_id='$contactid'");
    $header = "From: Echo <echo@gmail.com>\n";
    $header .= "X-Sender: echo@gmail.com\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "X-Priority: 1\n";
    $header .= "Reply-To:echo@gmail.com\r\n" .
        $header .= "Content-Type: text/html; charset=UTF-8\n";
    $message = $_POST['text'];
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    mail($to, $subject, $message, $header);


    redirection('user_message.php?r=0');

}
else{
    redirection('user_message.php?r=1');
}
?>