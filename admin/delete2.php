<?php
include('C:\xampp\htdocs\hotel\db_config2.php');
function redirection(string $url)
{
    header("Location:$url");
    exit();
}

if(isset($_POST['delete2'])) {
    $delete = $_POST['delete2'];
    $sql2 = "DELETE FROM contact WHERE contact_id =".$delete;
    $myData = mysqli_query($connection, $sql2);
    if ($myData) {
        redirection('contact_message.php?d=0');
    } else {
        redirection('contact_message.php?d=1');
    }
}
if(isset($_POST['delete3'])) {
    $delete = $_POST['delete3'];
    $sql2 = "DELETE FROM guest_contact WHERE guest_contact_id =".$delete;
    $myData = mysqli_query($connection, $sql2);
    if ($myData) {
        redirection('user_message.php?d=0');
    } else {
        redirection('user_message.php?d=1');
    }
}
if(isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $sql2 = "DELETE FROM book WHERE book_id =".$delete;
    $myData = mysqli_query($connection, $sql2);
    if ($myData) {
        redirection('price.php?u=3');
    } else {
        redirection('price.php?u=4');
    }
}