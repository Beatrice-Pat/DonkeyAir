<?php



require_once './bddConnexion.php';
include('header.php');


//page: update (modifier) un vol

//j'ai pris l'id du vol et le nommer "updateid" en utilisant GET, updatedid(dans la page account qui est la page pour mon compte, delete et update d'un vol, le button edit et delete contient l'id(updateid et deleteid)du vol pour detecter le vol qu'on veut mofifier ou suprrimer)


// avec un SELECT on fetch(retirer) les données et on les a mis dans la partie value du form pourque le form soit prerempli et puis avec un UPDATE on met à jour les nouveau data.
try{
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM bookings WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([':id'=>$id]);
    $options = $statement ->fetchAll();
    $id = $options['id'];
    $option_id = $options['option_id'];
   
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


try {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['luggage']) && !empty($_POST['meal'])) {
            $luggage = $_POST['luggage'];
            $meal = $_POST['meal'];
            $sql = "UPDATE options SET option_id = :option_id WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':option_id'=>$option_id]);
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
    <h3>Modifier les options : </h3> <br> <br>
    <div class="mb-3">
    <input class="form-check-input" type="checkbox" id="luggage">
          <label class="form-check-label" for="luggage"> Ajouter un baggage supplémentaire en soute (optionnel)<?php echo $option_id; ?></label>
    </div>
    <div class="mb-3">
    <input class="form-check-input" type="checkbox" id="meal">
          <label class="form-check-label" for="meal"> Ajouter un repas (optionnel)<?php echo $option_id; ?></label>
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Sauvegarder</button>
</form>
</section>
</body>
</html>
