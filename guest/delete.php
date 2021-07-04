<?php
include('C:\xampp\htdocs\hotel\db_config2.php');
function redirection(string $url)
{
    header("Location:$url");
    exit();
}


if(isset($_POST['delete3'])) {
    $delete1 = $_POST['delete3'];
    $sql = "SELECT * FROM book where book_id=" . $delete1;
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {

        while ($row2 = $result->fetch_assoc()) {
            $arr = strtotime($row2['arrival_date']);
            $now=strtotime(date("Y-m-d"));

        }
        echo $now;
        $datediff = ($arr-$now);
        $date = $datediff / (60 * 60 * 24);
        echo $date;

        if($date>10)
        { $sql3 = "DELETE FROM book WHERE book_id =".$delete1;
            $myData1 = mysqli_query($connection, $sql3);
           if ($myData1) {
                redirection('booking.php?r=3');
            } else {
                redirection('booking.php?r=4');
            }

        }
        else{
            redirection('booking.php?r=5');
        }


    }

}
