<?php
include('header.php');
require_once 'db_connexion_info.php';

session_start();

?>

<body>
    <h1>Mon compte</h1> <br> <br>
    <table class=“table”>
        <thead>
            <tr>
                <th scope=“col”>Date de réservation</th>
                <th scope=“col”>Vol</th>
                <th scope=“col”>Pour</th>
                <th scope=“col”>Option</th>
                <th></th>
            </tr>
        </thead>
<?php
$sql = 'SELECT bookings.*, flights.*, user_infos.lastname, user_infos.firstname, options.* 
        FROM bookings 
        INNER JOIN flights ON flights.id = bookings.flight_id 
        INNER JOIN user_infos ON user_infos.id = bookings.user_id 
        INNER JOIN options ON options.id = bookings.option_id 
        WHERE user_infos.id = ' . $_COOKIE["donkey_air_user_id"];

$stmt = $pdo->query($sql);
$bookings = $stmt->fetchAll();

for ($i = 0; $i < count($bookings); $i++) {
    $booking_id = $bookings[$i][0];
    $reservation_date = $bookings[$i]['reservation_date'];
    $flight_id = $bookings[$i]['vol_number'];
    $user_id = $bookings[$i]['id'];
    $lastname = $bookings[$i]['lastname'];
    $firstname = $bookings[$i]['firstname'];
    $option_luggage = $bookings[$i]['luggage'];
    $option_meal = $bookings[$i]['meal']; ?>
    <tr>
        <div>
            <td><?php echo $reservation_date; ?></td>
            <td><?php echo $flight_id; ?></td>
            <td><?php echo $lastname . ' ' . $firstname; ?></td>
            <td><?php echo $option_luggage; ?></td>
            <td><?php echo $option_meal; ?></td>
            <td><button type=“button” class=“btn btn-info “><a style=“text-decoration: none; color:white” href=”copyupdate.php?updateid=<?php echo $booking_id; ?>“>MODIFIER</a></button></td>
            <td><button type=“button” class=“btn btn-danger”><a style=“text-decoration: none; color:white” href=delete.php?deleteid=<?php echo $booking_id; ?>>SUPPRIMER</a></button></td>
        </div>
    </tr>
<?php
} ?>
</table>
</script>
</body>
</html>