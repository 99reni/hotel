<?php
require_once "db_config2.php";

function redirection(string $url)
{
    header("Location:$url");
    exit();
}

if  (empty($_POST['name']) or empty($_POST['phone'])  or empty($_POST['email']) or
    empty($_POST['text']))
{
    redirection('contact.php?c=3');
}
if (isset($_POST['name']) &&  isset($_POST['phone']) && isset($_POST['email']) &&
    isset($_POST['text'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $sql = "INSERT INTO contact (name,phone,email,text)  VALUES('$name', '$phone', '$email', '$text')";
    $myData = mysqli_query($connection, $sql);
    if ($myData) {
        redirection('contact.php?c=0');
    }

    else {
        redirection('contact.php?c=1');
    }

}
else {
    redirection('contact.php?c=2');
}

?>