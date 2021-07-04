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
$sql="SELECT email from users";
$result = mysqli_query($connection,$sql);
$columnValues = Array();
while ( $row = mysqli_fetch_assoc($result) ) {
    $columnValues[] = $row['email'];
}

if ( isset($_POST['subject']) && isset($_POST['text']))
{

    foreach($columnValues as $key => $key_value) {
        $header = "From: Echo <echo@gmail.com>\n";
        $header .= "X-Sender: echo@gmail.com\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        $header .= "X-Priority: 1\n";
        $header .= "Reply-To:echo@gmail.com\r\n" .
        $header .= "Content-Type: text/html; charset=UTF-8\n";
        $message = $_POST['text'];
        $to = $key_value;
        $subject = $_POST['subject'];
        mail($to, $subject, $message, $header);

    }
redirection('circular.php?e=0');

}
else{
    redirection('circular.php?e=1');
}

?>