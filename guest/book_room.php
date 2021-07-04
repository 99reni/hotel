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
include('config.php');
class book_the_room{

    public $link;
    function __construct(){
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    function booking ($id_user, $room_id,$price,$identity_card,$phone,$country,$city,$arrival_date,$deparature_date,$address,$payment,$meal,$pool,$gym,$meal_person,$pool_person,$gym_person,$services_price){
        $query = $this->link->prepare("INSERT INTO hotel.book (id_user,room_id,price,identity_card,phone,country,city,arrival_date,deparature_date,address,payment,meal,pool,gym,meal_person,pool_person,gym_person,services_price)
         VALUES (:id_user,:room_id,:price,:identity_card,:phone,:country,:city,:arrival_date,:deparature_date,:address,:payment,:meal,:pool,:gym,:meal_person,:pool_person,:gym_person,:services_price)");
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':room_id', $room_id);
        $query->bindParam(':price', $price);
        $query->bindParam(':identity_card', $identity_card);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':country', $country);
        $query->bindParam(':city', $city);
        $query->bindParam(':arrival_date', $arrival_date);
        $query->bindParam(':deparature_date', $deparature_date);
        $query->bindParam(':address', $address);;
        $query->bindParam(':payment', $payment);
        $query->bindParam(':meal', $meal);
        $query->bindParam(':pool', $pool);
        $query->bindParam(':gym', $gym);
        $query->bindParam(':meal_person', $meal_person);
        $query->bindParam(':pool_person', $pool_person);
        $query->bindParam(':gym_person', $gym_person);
        $query->bindParam(':services_price', $services_price);
        $query->execute();
    }

}


if (isset($_POST['book'])) {
    $id_user = $_SESSION['id_user'];
    $room_id = $_SESSION['room_id'];
    $price = $_SESSION['room_price'];
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


        include('C:\xampp\htdocs\hotel\db_config2.php');
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

        $book = new book_the_room();
        $book->booking($id_user, $room_id, $price, $identity_card, $phone, $country, $city, $arrival_date, $deparature_date, $address, $payment,$meal,$pool,$gym,$meal_person,$pool_person,$gym_person,$services_price);

        redirection('booking.php?r=0');
    }

    else {
        redirection('booking.php?r=2');
    }


}
else{
    redirection('booking.php?r=1');
}

?>


