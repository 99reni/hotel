<?php
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
session_start();
include('C:\xampp\htdocs\hotel\db_config2.php');
if (isset($_POST['book'])) {
    $book_id=$_POST['book_id'];
    $id_user = $_SESSION['id_user'];
    $room_id = $_POST['room_id'];
    $price=$_POST['price'];
    $identity_card = $_POST['identity'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $arrival_date = $_POST['arrival_date'];
    $deparature_date = $_POST['deparature_date'];
    $dateTimestamp1 = strtotime($arrival_date);
    $dateTimestamp2 = strtotime($deparature_date);
    $payment = $_POST['payment'];
    $gym = $_POST['gym'];
    $pool = $_POST['pool'];
    $meal = $_POST['meal'];
    $meal_person = $_POST['meal_person'];
    $gym_person = $_POST['gym_person'];
    $pool_person = $_POST['pool_person'];


    if ($dateTimestamp1 < $dateTimestamp2)
    {
        $arr = strtotime($arrival_date);
        $dep = strtotime($deparature_date);
        $datediff = ($dep - $arr);
        $date = $datediff / (60 * 60 * 24);
        $result= mysqli_query($connection,  "SELECT * FROM room where room_id=".$room_id);
        if(mysqli_num_rows($result)!=0) {
            foreach($result as $row){
                $price = ($price - ($price * ($row['discount']/100)))*$date;
            }
        }
        else {
            $price = $price * $date;

        }
        $services_price = 0;

        $sql2 = "SELECT * FROM price";
        $myData = mysqli_query($connection, $sql2);
        $gymp=$mealp=$poolp=0;
        if ($myData) {
            foreach ($myData as $row) {
                if ($meal == 'yes') {
                    $mealp = ($row['meal_price']) * $meal_person * $date;

                }
                if ($pool == 'yes') {
                    $poolp = ($row['pool_price']) * $pool_person;

                }
                if ($gymp == 'yes') {
                    $gymp = ($row['gym_price']) * $gym_person;


                }
            }
        }
        $services_price = $mealp + $gymp + $poolp;

        $sql = "UPDATE book SET price='$price',identity_card ='$identity_card', phone='$phone',country='$country', arrival_date='$arrival_date',deparature_date='$deparature_date',
address='$address',payment='$payment',meal='$meal',pool='$pool',gym='$gym',meal_person='$meal_person',pool_person='$pool_person',gym_person='$gym_person',services_price='$services_price' where book_id='$book_id'";
        $myData2 = mysqli_query($connection, $sql);
        if ($myData2){
           redirection('booking.php?r=6');
        }



    }

    else {
        redirection('booking.php?r=2');
    }


}
else{
   // redirection('booking.php?r=7');
}

?>


