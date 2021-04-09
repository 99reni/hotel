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
/** Function checks that user exists in users table
 *
 * @param string $username
 * @param string $password
 * @return array
 */
function checkUserLogin(string $username, string $password): array
{
    global $connection;

    $sql = "SELECT admin_id FROM admin WHERE username = '$username' AND password = MD5('$password')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $sql2="UPDATE admin SET last_login = now() WHERE admin_id=1";
    $result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result)) {
            $data['admin_id'] = (int)$record['admin_id'];
        }
    }
    return $data;

}
$sd = "";
$username = "";
$password = "";
$sd = mysqli_real_escape_string($connection, trim($_POST["sd"]));

if ($sd != "") {

    switch ($sd) {
        case "login":

            if (!empty($_POST['username']) and !empty($_POST['password'])) {
                $username = mysqli_real_escape_string($connection, trim($_POST["username"]));
                $password = mysqli_real_escape_string($connection, trim($_POST["password"]));

                $data = checkUserLogin($username, $password);
                if ($data and is_int($data['admin_id'])) {
                    session_regenerate_id();
                    $_SESSION['username'] = $username;
                    $_SESSION['admin_id'] = $data['admin_id'];
                    redirection('welcomeadmin.php');
                } else {
                    redirection('index.php?l=0');
                }

            } else {
                redirection('index.php?l=0');
            }
            break;
    }
}
?>