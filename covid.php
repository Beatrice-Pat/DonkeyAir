<?php
//connexion à la base de données
require_once './bddConnexion.php';
include 'header.php';

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

<body class="covid">
    <h3>COVID-19 : DERNIÈRES INFORMATIONS</h3>

    <p>Le port du masque (sans valve) est fortement recommandé à bord de nos avions dès l’âge de six ans.
Vous souhaitez vérifier les conditions à remplir avant votre départ, découvrir nos mesures sanitaires, ou en savoir plus sur nos billets modifiables* ? Consultez nos pages dédiées.</p>

<p>* Sous réserve d'éventuels frais de modification et/ou d'un éventuel réajustement tarifaire. Voir les conditions tarifaires de votre billet. </p>


<img class="logo" src="Images/stickers-port-masque-obligatoire-autocollant.jpeg" ></img>


<?php
include 'footer.php';
?>

</body>
</html>