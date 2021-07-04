<?php
session_start();
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
if (isset($_POST['rating']))
{
    $id=$_SESSION['id_user'];
    $rate=$_POST['rating'];
    $sql = "Insert into guest_contact (id_user,rating,date_time) values('$id','$rate',now())";
    $myData = mysqli_query($connection, $sql);
    if($myData){
        redirection('contact.php?u=0');
    }
    else{
        redirection('contact.php?u=1');
    }

}
if (isset($_POST['text']))
{
    $id2=$_SESSION['id_user'];
    $comment=$_POST['text'];
    $sql = "Insert into guest_contact (id_user,text,date_time) values('$id2','$comment',now())";
    $myData = mysqli_query($connection, $sql);
    if($myData){
        redirection('contact.php?u=2');
    }
    else{
        redirection('contact.php?u=3');
    }
}

?>