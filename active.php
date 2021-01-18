<?php

require "config.php";
require "db_config.php";

$code = "";
$l = "";



if (isset($_GET['code']))
    $code = mysqli_real_escape_string($connection, $_GET['code']);

if (!empty($code) AND strlen($code) == 40) {
    $sql = "UPDATE users SET active='1', code=''
            WHERE  binary code = '$code' AND registration_expires>now()";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_affected_rows($connection) > 0) {
        $l = "?l=6";
    }

}

header("Location:register.php$l");
exit();
?>