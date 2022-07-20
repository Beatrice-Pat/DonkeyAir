<?php



require_once './bddConnexion.php';
include('header.php');


//page: update (modifier) un vol

//j'ai pris l'id du vol et le nommer "updateid" en utilisant GET, updatedid(dans la page account qui est la page pour mon compte, delete et update d'un vol, le button edit et delete contient l'id(updateid et deleteid)du vol pour detecter le vol qu'on veut mofifier ou suprrimer)


// avec un SELECT on fetch(retirer) les données et on les a mis dans la partie value du form pourque le form soit prerempli et puis avec un UPDATE on met à jour les nouveau data.
try{
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM bookings WHERE id = :id";
    $statement= $pdo->prepare($sql);
    $statement->execute([':id'=>$id]);
    $bookings = $statement ->fetch();
    $id= $bookings['id'];
    $reservation_date=$bookings['reservation_date'];
    $flight_id=$bookings['flight_id'];
    $user_id = $bookings['user_id'];
    $option_id = $bookings['option_id'];
   
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


try {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['reservation_date']) && !empty($_POST['flight_id']) && !empty($_POST['option_id']) && !empty($_POST['user_id'])) {
            $id= $row['id'];
            $reservation_date= $_POST['reservation_date'];
            $flight_id= $_POST['flight_id'];
            $user_id= $_POST['user_id'];
            $option_id= $_POST['option_id'];
            $sql = "UPDATE  booking SET  reservation_date =:reservation_date, flight_id = :flight_id , user_id = :user_id, option_id = :option_id WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id'=>$id,':reservation_date'=>$reservation_date, ':flight_id'=>$flight_id, ':user_id'=>$user_id, ':option_id'=>$option_id]);
            header('location:account.php');
            
        } 
        else {
            echo"Please fill out all the required information!";
        }
    }
}
catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}


?>


    
<section>

<form action="" method="post" >
    <h3>Modifier un vol:</h3> <br> <br>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Date de réservation:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="reservation_date" value="<?php echo $reservation_date; ?>">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Vol:</label>
        <input type="text" class="form-control" name="flight_id" id="formGroupExampleInput2" value="<?php echo $flight_id;?>">
    </div>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Pour:</label>
        <input type="text" class="form-control" name="user_id" id="formGroupExampleInput" value="<?php echo $user_id;?>">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Baggage(s):</label>
        <input type="decimal" class="form-control" name="option_id" id="formGroupExampleInput2" value="<?php echo $option_id; ?>">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Repas:</label>
        <input type="decimal" class="form-control" name="option_id" id="formGroupExampleInput2" value="<?php echo $option_id; ?>">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Sauvegarder</button>
</form>
</section>
</body>
</html>
