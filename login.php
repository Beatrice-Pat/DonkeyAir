<?php

session_start();
check_user();

function check_user() : string
{
    GLOBAL $pdo;
    //on controle si les champs email et password est bien rempli sinon messages ERROR
    if (isset($_REQUEST['login'])) {
        return "Veuillez saisir un login";
    }

    if (empty($email)) {
        return 'Entrer un mail s\'il vous plait !';
    }

    if (empty($password)) {
        return 'Entrer un mot de passe s\'il vous plait !';
    }

    try {
        $email = strtolower(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = htmlspecialchars($_POST['password']);
        //on controle si le mail est bien dans notre database(si le user est déja inscrit)
        $select_statment = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $select_statment->execute([':email' => $email]);
        $row = $select_statment->fetch(PDO::FETCH_ASSOC);

        if ($select_statment->rowCount() == 0) {
            return "Veuillez vous enregistrer.";
        }

        if ($select_statment->rowCount() > 1) {
            return "Veuillez contacter l'administrateur.";
        }
        // on controle si le password corespond bien à celui de notre bdd
        if (password_verify($password, $row['password'])) {
            $_SESSION['userName'] = $row["user_name"];
            $_SESSION['userEmail'] = $row["email"];
            $_SESSION['userId'] = $row["id"];
            header('location:index.php');
        } else {
                return 'Mot de passe ou mail incorrect !';
        }
    } catch (PDOException $e) {
        echo "ERROR!!!: " . $e->getMessage();
    }
}
?>


<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<title>DonkeyAir</title>
<style>
    body{
        height: 100vh;
        background-image: url('Images/photo2.jpg');
        display: flex;
        background-repeat: no-repeat;
        background-size: cover;
        justify-content: center;
        }
</style>
<body>
    <main>
    <div id="container">
        <!-- zone de connexion -->
        <form action="header.php" method="POST">
            <h1>Connexion</h1>
                
            <label><b></b></label>
            <input type="email" placeholder="Entrer l'adresse mail" name="email" required>
            <?php if (isset($mailErr)) : ?>
                <p><?php echo $mailErr ?></p>
                <?php endif ?> 

            <label><b></b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <?php if (isset($passwordErr)) : ?>
                <p><?php echo $passwordErr; ?></p>
                <?php endif ?> 
            <input type="submit" id='submit' value='Se connecter'></input>
        </form>
    </div>
    </main>
</body>
</html>