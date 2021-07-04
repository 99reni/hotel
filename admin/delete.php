<?php
include('C:\xampp\htdocs\hotel\db_config2.php');
function redirection(string $url)
{
    header("Location:$url");
    exit();
}

if(isset($_POST['delete']))
{
    $delete = $_POST['delete'];
    $sql="SELECT room_type FROM room WHERE room_id =".$delete;
    $query= mysqli_query($connection,$sql);
    if (mysqli_num_rows($query) != 0) {
        foreach ($query as $row) {
            if($row['room_type']=='single')
            {
                $sql2 = "DELETE FROM room WHERE room_id =".$delete;
                $myData = mysqli_query($connection, $sql2);
                if ($myData) {
                    redirection('single.php?d=0');
                } else {
                    redirection('single.php?d=1');
                }
            }
            elseif ($row['room_type']=='double')
            {
                $sql2 = "DELETE FROM room WHERE room_id =".$delete;
                $myData = mysqli_query($connection, $sql2);
                if ($myData) {
                    redirection('double.php?d=0');
                } else {
                    redirection('double.php?d=1');
                }
            }
            elseif ($row['room_type']=='multiple')
            {
                $sql2 = "DELETE FROM room WHERE room_id =".$delete;
                $myData = mysqli_query($connection, $sql2);
                if ($myData) {
                    redirection('multiple.php?d=0');
                } else {
                    redirection('multiple.php?d=1');
                }
            }

        }
    }
    else{
        redirection('welcomeadmin.php?d=2');
    }
    }
elseif (isset($_POST['delete_user']))
        {
            $delete_user = $_POST['delete_user'];
            $sql3 = "DELETE FROM users WHERE id_user =".$delete_user;
            $myData = mysqli_query($connection, $sql3);
            if ($myData) {
                redirection('user.php?u=0');
            } else {
                redirection('user.php?u=1');
            }
        }
else{
    redirection('welcomeadmin.php?d=2');
}
?>