<?php
session_start();
require "functions_def.php";

$sd = "";
$username = "";
$password = "";
$firstname = "";
$lastname = "";
$email = "";

$sd = mysqli_real_escape_string($connection, trim($_POST["sd"]));

$referer = $_SERVER['HTTP_REFERER'];

echo  $_SERVER['HTTP_REFERER'];
//echo SITE;
//$t =  strpos($referer,SITE);
//var_dump($t);
//var_dump($referer);
//exit();

//  http://localhost/ec_2020/08/web_site/active.php?&code=OkpkpnfnUnbdtranZlaptyooUiovguevNzzbuvjy
// 'http://localhost/ec_2020/08/web_site/index.php'
// 'http://localhost/ec_2020/08/web_site'

if ($sd != "" AND strpos($referer, SITE) !== false) {

    switch ($sd) {
        case "login":

            if (!empty($_POST['username']) AND !empty($_POST['password'])) {
                $username = mysqli_real_escape_string($connection, trim($_POST["username"]));
                $password = mysqli_real_escape_string($connection, trim($_POST["password"]));

                $data = checkUserLogin($username, $password);
                if ($data AND is_int($data['id_user'])) {
                    session_regenerate_id();
                    $_SESSION['username'] = $username;
                    $_SESSION['id_user'] = $data['id_user'];
                    redirection('/hotel/guest/index.php');
                } else {
                    redirection('login.php?l=1');
                }

            } else {
                redirection('login.php?l=1');
            }
            break;

        case "register" :

            if (isset($_POST['captcha']) AND !empty($_POST['captcha'])) {
                $captcha = mysqli_real_escape_string($connection, trim($_POST["captcha"]));
                if ($captcha != $_SESSION['code']) {
                    redirection('register.php?l=7');
                }
            } else {
                redirection('register.php?l=4');
            }


            if (isset($_POST['username']) AND !empty($_POST['username'])) {
                $username = mysqli_real_escape_string($connection, trim($_POST["username"]));
            } else {
                redirection('register.php?l=4');
            }

            if (isset($_POST['password']) AND !empty($_POST['password']) ) {
                if(strlen($_POST['password']) >= 8)
                {
                    $password = mysqli_real_escape_string($connection, trim($_POST["password"]));
                }
                else{
                    redirection('register.php?l=8');
                }
            } else {
                redirection('register.php?l=4');
            }

            if (isset($_POST['firstname']) AND !empty($_POST['firstname'])) {
                $firstname = mysqli_real_escape_string($connection, trim($_POST["firstname"]));
            } else {
                redirection('register.php?l=4');
            }

            if (isset($_POST['lastname']) AND !empty($_POST['lastname'])) {
                $lastname = mysqli_real_escape_string($connection, trim($_POST["lastname"]));
            } else {
                redirection('register.php?l=4');
            }
            if (isset($_POST['email']) AND !empty($_POST['email']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = mysqli_real_escape_string($connection, trim($_POST["email"]));
            } else {
                redirection('register.php?l=4');
            }

            if (!existsUser($username)) {
                registerUser($username, $password, $firstname, $lastname, $email);
                redirection('register.php?l=3');
            } else {
                redirection('register.php?l=2');
            }

            break;


        default:
            redirection('register.php?l=0');
            break;
    }

} else {
    redirection('register.php?l=0');
}

?>