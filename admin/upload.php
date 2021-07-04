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

if(isset($_POST["submit"]) && isset($_POST['upload'])) {
    $upload = $_POST['upload'];
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $sql="SELECT room_type FROM room WHERE room_id =".$upload;
    $query= mysqli_query($connection,$sql);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        if (mysqli_num_rows($query) != 0) {
            foreach ($query as $row) {
                if ($row['room_type'] == 'single') {
                    $sql2 = "UPDATE room SET room_image='$imgContent' where room_id=" . $upload;
                    $myData = mysqli_query($connection, $sql2);
                    if ($myData) {
                        redirection('single.php?i=0');
                    } else {
                        redirection('single.php?i=1');
                    }
                } elseif ($row['room_type'] == 'double') {
                    $sql2 = "UPDATE room SET room_image='$imgContent' where room_id=" . $upload;
                    $myData = mysqli_query($connection, $sql2);
                    if ($myData) {
                        redirection('double.php?i=0');
                    } else {
                        redirection('double.php?i=1');
                    }
                } elseif ($row['room_type'] == 'multiple') {
                    $sql2 = "UPDATE room SET room_image='$imgContent' where room_id=" . $upload;
                    $myData = mysqli_query($connection, $sql2);
                    if ($myData) {
                        redirection('multiple.php?i=0');
                    } else {
                        redirection('multiple.php?i=1');
                    }
                }
            }
        }
    }
}
else{
   echo"Baj van";
}

?>