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

if(isset($_POST['room_id']) && isset($_POST['room_type'])
    && isset($_POST['room_price'])&& isset($_POST['room_price']) && isset ($_POST['discount']) && isset($_POST['free_room']) && isset($_POST['update']))
{
    $update = $_POST['update'];
    $room_type=$_POST['room_type'];


    $sql = "UPDATE room SET room_id='$_POST[room_id]',room_type='$_POST[room_type]',
 room_price='$_POST[room_price]', free_room='$_POST[free_room]', discount='$_POST[discount]' WHERE room_id='$_POST[room_id]'";
    var_dump($sql);
    $myData = mysqli_query($connection, $sql);
    if($room_type=='single') {
        if ($myData) {
            redirection('single.php?u=0');
        } else {
            redirection('single.php?u=1');
        }
    }
    elseif ($room_type=='double')
    {
        if ($myData) {
            redirection('double.php?u=0');
        } else {
            redirection('double.php?u=1');
        }
    }
    elseif ($room_type=='multiple')
    {
        if ($myData) {
            redirection('multiple.php?u=0');
        } else {
            redirection('multiple.php?u=1');
        }
    }
}
else
{
     if($_POST['room_type']=="single") {

         redirection('single.php?u=2');
     }
     elseif ($_POST['room_type']=="double"){

             redirection('double.php?u=2');
     }
     elseif ($_POST['room_type']=="multiple"){

         redirection('multiple.php?u=2');
     }


}
?>