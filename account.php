<?php
include('header.php');
require_once 'db_connexion_info.php';

session_start();

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    if (isset($_POST['email']) && isset($_POST['password'])) {
        user_login();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
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
</body>
<tr>
    <?php
    $sql = 'SELECT bookings.reservation_date, flights.*, user_infos.lastname, user_infos.firstname, options.* 
            from bookings 
            inner join flights on flights.id = bookings.flight_id 
            inner join user_infos on user_infos.id = bookings.user_id  
            inner join options on options.id = bookings.option_id';

    $stmt = $pdo->query($sql);
    $bookings = $stmt->fetchAll();

    //var_dump($bookings);

    for ($i = 0; $i < count($bookings); $i++) {
        $id = $bookings[$i]['id'];
        $reservation_date = $bookings[$i]['reservation_date'];
        $flight_id = $bookings[$i]['vol_number'];
        $user_id = $bookings[$i]['id'];
        $lastname = $bookings[$i]['lastname'];
        $firstname = $bookings[$i]['firstname'];
        $option_luggage = $bookings[$i]['luggage'];
        $option_meal = $bookings[$i]['meal']; ?>

        <div>
            <td><?php echo $reservation_date; ?></td>
            <td><?php echo $flight_id; ?></td>
            <td><?php echo $lastname . ' ' . $firstname; ?></td>
            <td><?php echo $option_luggage; ?></td>
            <td><?php echo $option_meal; ?></td>
            <td><button type=“button” class=“btn btn-info “><a style=“text-decoration: none; color:white” href=” copyupdate.php?updateid=<?php echo $id; ?>“>MODIFIER</a></button></td>
            <td><button type=“button” class=“btn btn-danger”><a style=“text-decoration: none; color:white” href=“delete.php?deleteid=<?php echo $id; ?>“>SUPPRIMER</a></button></td>
        </div>
    <?php
    } ?>
</tr>
</body>
</table>
</body>

</html>