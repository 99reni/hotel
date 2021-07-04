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
if(isset($_POST['meal_price']) && isset($_POST['gym_price']) && isset($_POST['pool_price']))
{
    $sql = "UPDATE price SET meal_price='$_POST[meal_price]',gym_price='$_POST[gym_price]',
 pool_price='$_POST[pool_price]'";
    $myData = mysqli_query($connection, $sql);
    if($myData){
        redirection('price.php?u=0');
    }
    else{
        redirection('price.php?u=1');
    }

}
else{
    redirection('price.php?u=2');
}
?>