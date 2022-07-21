<?php

include('header.php');
require_once './bddConnexion.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="Images/icons8-student-64.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Mon compte</h1> <br> <br>
    <table class="table">
        <head>
            <tr>
                <th scope="col">Date de réservation</th>
                <th scope="col">Vol</th>
                <th scope="col">Pour</th>
                <th scope="col">Baggage(s)</th>
                <th scope="col">Repas</th>
                <th scope="col">Prix</th>
            </tr>
            <br>
        </head>
</body>

    <?php
    $sql = 'SELECT bookings.reservation_date, flights.*, user_infos.lastname,
            user_infos.firstname, options.* from bookings 
            inner join flights on flights.id = bookings.flight_id 
            inner join user_infos on user_infos.id = bookings.user_id  
            inner join options on options.id = bookings.option_id';

    $stmt = $pdo->query($sql);
    $bookings = $stmt->fetchAll(); 

    for ($i = 0; $i < count($bookings); $i++) {
        $id = $bookings[$i]['id'];
        $reservation_date = $bookings[$i]['reservation_date'];
        $flight_id = $bookings[$i]['vol_number'];
        $user_id = $bookings[$i]['id'];
        $lastname = $bookings[$i]['lastname'];
        $firstname = $bookings[$i]['firstname'];
        $option_luggage = $bookings[$i]['luggage'];
        $option_meal = $bookings[$i]['meal'];
        $price_id = $bookings[$i]['price'];?>

        <tr>
        <div>
            <td scope="col"><?php echo $reservation_date; ?></td> 
            <td scope="col"><?php echo $flight_id; ?></td>
            <td scope="col"><?php echo $lastname . ' ' . $firstname; ?></td>
            <td scope="col"><?php echo $option_luggage; ?></td>
            <td scope="col"><?php echo $option_meal; ?></td> 
            <td scope="col"><?php echo $price_id; ?></td> 
            
            <td><button type="button" class="btn btn-info "><a style="text-decoration: none; color:white" href=" copyupdate.php?updateid=<?php echo $id; ?>">MODIFIER</a></button></td>
            <td><button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="delete.php?deleteid=<?php echo $id; ?>">ANNULATION</a></button></td> 

        </div> 
        </tr>    
    <?php
}   ?>


</body>
</table>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

<?php
include 'footer.php';
?>

</html>