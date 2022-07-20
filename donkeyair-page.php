<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
  <!Css-->
  <link href="donkey.css" rel="stylesheet">
  
  <title>Réservations</title>
</head>

<body>
  <!--Barre de navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="booking.php">Réservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="account.php">Mes réservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-md center">
    <script src="animation.js"> </script>
    <h1> DonkeyAir
      <span class="txt-rotate" data-period="2000" data-rotate='[ "Company", "Family", "Fun!" ]'></span>
    </h1>
    
    <p>1ère compagnie aérienne à vous offrir un <strong>service exceptionnel</strong> grâce à l’attention que nous apportons à nos clients pour rendre votre trajet plus agréable </br>
     Un avant goût de vacances ensoleillées avec une <strong>ambiance détendue</strong> : sièges matelassés, cocktails, ambiance musicale, tout pour vous aider à lâcher prise... </br>
    Les vacances se terminent toujours trop rapidement...alors arrêtez immédiatement de lire ce message et <strong>courez plus vite à l'aéroport</strong>, nous rejoindre! <strong> Bon voyage !</strong></br>
   <div class="button">
    <a href="booking.php" class="btn btn-danger btn-lg" role="button">Prêt à partir !</a>
   </div>
  </div>
  <div class="scene">
    <span class="cloud cloud--small"></span>
    <svg xmlns="http://www.w3.org/2000/svg" id="plane" class="plane" viewBox="0 0 104 47" x="0" y="0" width="104" height="47" background-color="#ffffff00">
      <g id="avion">
        <path d="M20 36C25 38 69 43 80 40 92 38 106 33 104 21 103 13 95 13 90 9 85 5 79 2 76 1 70-1 65 0 60 2 57 3 25 14 23 13 21 12 12 2 9 3 5 4 1 5 1 6 2 7 15 34 20 36Z" fill="#0085b2" />
        <path d="M23 36C28 37 69 43 80 40 88 38 98 34 102 29 82 32 22 36 23 36Z" stroke="#ffffff00" stroke-width="1" fill="#14647f" />
        <path d="M42 39C48 40 60 40 67 40 71 32 72 26 72 26L44 29C44 29 44 35 42 39Z" stroke="#ffffff00" stroke-width="1" fill="#0c3b4d" />
        <path d="M7 16C7 16 9 20 10 22 13 27 16 13 16 13L7 16Z" stroke="#ffffff00" stroke-width="1" fill="#0c3b4d" />
        <path d="M40 29C40 29 41 34 34 42 27 51 48 46 58 39 74 28 72 25 72 25L40 29Z" stroke="#ffffff00" stroke-width="1" fill="#006e96" />
        <path d="M5 14C5 14 6 15 3 19 1 22 10 20 13 17 19 11 17 11 17 11L5 14Z" stroke="#ffffff00" stroke-width="1" fill="#006e96" />
        <path d="M90 10C88 8 83 4 80 3 78 3 68 7 68 8 70 12 80 8 90 10Z" stroke="#ffffff00" stroke-width="1" fill="#0c3b4d" />
        <path d="M89 9C87 7 82 3 79 2 77 2 67 6 67 7 69 11 79 7 89 9Z" stroke="#ffffff00" stroke-width="1" fill="#afe2ff" />
      </g>
    </svg>
    <span class="cloud cloud--medium"></span>
    <span class="cloud cloud--large"></span>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>