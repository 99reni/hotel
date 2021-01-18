<?php
require_once "config.php";
require_once "db_config.php";


function redirection(string $url)
{
    header("Location:$url");
    exit();
}



function checkUserLogin(string $username, string $password): array
{
    global $connection;
    $password_temp = SALT1 . "$password" . SALT2;

    

    $sql = "SELECT id_user FROM users 
            WHERE username = '$username'
            AND password = MD5('$password_temp') AND active=1";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result)) {
            $data['id_user'] = (int)$record['id_user'];
        }
    }
    return $data; 

}


function existsUser(string $username): bool
{
    global $connection;

    $sql = "SELECT id_user FROM users
            WHERE username = '$username' AND registration_expires>now()";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}



function registerUser(string $username, string $password, string $firstname, string $lastname, string $email)
{

    global $connection;

    $password_new = SALT1 . "$password" . SALT2;
    $code = createCode(40);

  

    $sql = "INSERT INTO users (username,password,firstname,lastname,email,code,registration_expires,active)
             VALUES ('$username',MD5('$password_new'),'$firstname','$lastname','$email','$code',DATE_ADD(now(),INTERVAL 1 DAY),0)";

    

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    sendData($username, $password, $email, $code);
}


function createCode(int $length): string
{
    $down = 97;
    $up = 122;
    $i = 0;
    $code = "";
   
    $div = mt_rand(3, 9);

    while ($i < $length) {
        if ($i % $div == 0)
            $character = strtoupper(chr(mt_rand($down, $up)));
        else
            $character = chr(mt_rand($down, $up)); 
        $code .= $character; 
        $i++;
    }
    return $code;
}

function sendData(string $username, string $password, string $email, string $code)
{

    $header = "From: Echo <echo@gmail.com>\n";
    $header .= "X-Sender: echo@gmail.com\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "X-Priority: 1\n";
    $header .= "Reply-To:echo@gmail.com\r\n" .
        $header .= "Content-Type: text/html; charset=UTF-8\n";

    $message = "Data\n\n user: $username \n password: $password \n\n";
    $message .= "\n\n to activate your account click on the link: " . SITE . "/active.php?code=$code";
    $to = $email;
    $subject = "Registration";
    mail($to, $subject, $message, $header);

}

?>
