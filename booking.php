<?php
//connexion à la base de données
require_once './connec.php';

try {
  $db = new PDO(DB_DSN, DB_USER, DB_PASS);
  $db->exec("SET NAMES utf8");
} catch (PDOException $e) {
  die($e->getMessage());
}

//$sql = $requete->fetchAll();
$sql = "SELECT DISTINCT `from` FROM `flights`";
//exécute la requete
$requete = $db->query($sql);
//récupère les données
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
  <link href="style.css" rel="stylesheet">
  <title>Réservations</title>
</head>

<body>
  <!--Barre de navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Mes réservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section>
    <!--<img class="image" src="/ile.jpg" alt="une plage avec des cocotiers">-->

    <!--Titre-->
    <h1 class="display-1 text-dark text-center"> Réservation</h1>
  </section>
  <!--Espace réservation-->
  <div class="container py-5 bg-light">
    <div class="row">
      <form action="page-recherche.php" method="post"></form>
      <div class="col-md-4 col-sm-6">
        <!--Barre de départ-->
        <select name="departure" id="departure-select" required>
          <option value="departure">--Ville de départ--</option>
          <?php foreach ($flights as $flight) { ?>
            <option value=""><?php echo $flight['from']; ?></option>
          <?php } ?>
        </select>
      </div>
      <!--Barre de desitination-->
      <div class="col-md-4 col-sm-6">
        <select name="country" id="country-select" required>
          <option value="">--Choisissez votre destination--</option>
          <?php foreach ($flights as $flight) { ?>
            <option value=""><?php echo $flight['from']; ?></option>
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
        <a href="./page-recherche.php" class="btn btn btn-secondary">Recherche</a>
        <?php $flight = "SELECT * FROM `fligths` WHERE `from` LIKE 'Pa%'" ?>
        <?php echo ($flight) ?>
      </div>
      </form>
    </div>
  </div>

  <!--Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>