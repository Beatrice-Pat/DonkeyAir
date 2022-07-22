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

<style>
  body {
    height: 100%;
    background-image: url('Images/avion1.jpg');
    background-size: cover;
  }
</style>

<body>
  <section>
    <!--Titre-->
    <h1>Réserver un billet</h1>
  </section>
  <!--Espace réservation-->
  <div class="search-form">
    <!-- Formulaire de recherche -->
    <div class="container">
      <form action="booking.php" method="post">
        <div class="form-group">
          <label for="provenance">Ville de départ</label>
          <select name="country" id="country-select" required>
            <option value="">Pointe à Pitre, Guadeloupe PTP</option>
            <?php foreach ($flights as $flight) { ?>
              <option value="<?php echo $flight['id'] ?>"><?php echo $flight['from']; ?></option>
            <?php } ?>
          </select>

          <label for="arrivee">Ville d'arrivée</label>
          <select name="country" id="country-select" required>
            <option value="">New York, USA JFK</option>
            <?php foreach ($flights as $flight) { ?>
              <option value="<?php echo $flight['id'] ?>"><?php echo $flight['from']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="date"> Date de départ </label>
          <input type="date" name="departure_date" id="date" required>

          <label for="return_date"> Date de retour </label>
          <input type="date" name="return_date" id="return_date" required>
          <name="passenger" id="passenger" required>
        </div>

        <div class="form-group">
          <label for="nbr_passager">Nombre de passagers</label>
          <select name="nbr_passager" id="nbr_passager">
            <option selected="selected">0</option>
            <option>1</option>
          </select>

        </div>

        <!--Options supllémentaires-->

        <div class="form-group">
          <input type="checkbox" id="luggage">
          <label for="luggage"> Ajouter un baggage supplémentaire en soute (optionnel)</label>
          <br>
          <input type="checkbox" id="meal">
          <label for="meal"> Ajouter un repas (optionnel)</label>
        </div>


        <div class="button-submit">
          <input type="submit" value="Lancer la recherche" name="recherche" id="recherche" class="btn btn btn-secondary">
        </div>

      </form>
    </div>





    <!--Bootstrap-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


<?php

include 'footer.php';

?>

</html>