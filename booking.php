<?php
//connexion à la base de données
require_once './bddConnexion.php';
include 'header.php';


//On écrit la requête
$sql = "SELECT * FROM `flights` ";
//On évécute la requête
$requete = $pdo->query($sql);
//On récupère les données
$flights = $requete->fetchAll(pdo::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <title>Réservations</title>
</head>

<body>
 
  <section>
    <!--<img class="image" src="/ile.jpg" alt="une plage avec des cocotiers">-->

    <!--Titre-->
    <h1>Réserver un billet</h1>
  </section>
  <!--Espace réservation-->
  <div class="container bg-light">
    <div class="row">
      <form action="booking.php" method="post">
      <div class="col-md-4 col-sm-6">
        <!--Barre de départ-->
        <select name="departure" id="departure-select" required>
          <option value="">--Ville de départ--</option>
          <?php foreach ($flights as $flight) { ?>
            <option value="<?php echo $flight['id'] ?>"><?php echo $flight['from']; ?></option>
          <?php } ?>
        </select>
      </div>
      <!--Barre de desitination-->
      <div class="col-md-4 col-sm-6">
        <select name="country" id="country-select" required>
          <option value="">--Choisissez votre destination--</option>
          <?php foreach ($flights as $flight) { ?>
            <option value="<?php echo $flight['id'] ?>"><?php echo $flight['from']; ?></option>
          <?php } ?>
        </select>
      </div>
      <!--Date de départ-->
      <div class="col-md-4 col-sm-6">
        <label for="date"> Date de départ </label>
        <input type="date" name="departure_date" id="date" required>
      </div>
      <!--Date de retour-->
      <div class="col-md-4 col-sm-6">
        <label for="return_date"> Date de retour </label>
        <input type="date" name="return_date" id="return_date" required>
        <name="passenger" id="passenger" required>
      </div>
      <!--Nombre de passagers-->
      <div class="col-md-4 col-sm-6">
        <select>
          <option value="nbr_passenger">--Nombre de passagers--</option>
          <option value="number"> 1 </option>
        </select>
      </div>
      <!--Options supllémentaires-->
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="luggage">
          <label class="form-check-label" for="luggage"> Ajouter un baggage supplémentaire en soute (optionnel)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="meal">
          <label class="form-check-label" for="meal"> Ajouter un repas (optionnel)</label>
        </div>
      </div>
      <!--Bouton recherche-->
      <div class="col-md-12 col-sm-6 text-center">
        <input type="submit" value="Recherche" class="btn btn btn-secondary">
      </div>
      </form>
    </div>
  </div>
  
  <!--Bootstrap-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


<?php

include 'footer.php';

?>

</html>