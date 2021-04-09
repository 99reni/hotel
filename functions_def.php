<?php
require_once "config.php";
require_once "db_config.php";

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
    $password_temp = SALT1 . "$password" . SALT2;

    // sha1 - hash of 40 chars
    // md5 - has of 32 chars

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
    return $data; // $data['id_user'] = 1;

}

/** Checks if user exists in user table
 * @param string $username
 * @return bool
 */
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


/** Registers user
 * @param string $username
 * @param string $password
 * @param string $firstname
 * @param string $lastname
 * @param string $email
 */
function registerUser(string $username, string $password, string $firstname, string $lastname, string $email)
{

    global $connection;

    $password_new = SALT1 . "$password" . SALT2;
    $code = createCode(40);

    // sha1 - hash of 40 chars
    // md5 - has of 32 chars

    $sql = "INSERT INTO users (username,password,firstname,lastname,email,code,registration_expires,active)
             VALUES ('$username',MD5('$password_new'),'$firstname','$lastname','$email','$code',DATE_ADD(now(),INTERVAL 1 DAY),0)";

    // http://dev.mysql.com/doc/refman/5.6/en/date-and-time-functions.html

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    sendData($username, $password, $email, $code);
}

/** Creates random code for entered length
 * @param int $length
 * @return string
 */
function createCode(int $length): string
{
    $down = 97;
    $up = 122;
    $i = 0;
    $code = "";
    /*    
      48-57  = 0 - 9
      65-90  = A - Z
      97-122 = a - z        
    */
    $div = mt_rand(3, 9);

    while ($i < $length) {
        if ($i % $div == 0)
            $character = strtoupper(chr(mt_rand($down, $up)));
        else
            $character = chr(mt_rand($down, $up)); // mt_rand(97,122) chr(98)
        $code .= $character; // $code = $code.$character; //
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
