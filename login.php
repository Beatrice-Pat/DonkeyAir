<?php

require_once 'db_connexion_info.php';

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    user_login();
} 

function user_login()
{
    try {
        global $pdo;
        $email = filter_var(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        $query = 'SELECT user_infos.*, user_passwords.mdp 
            FROM user_infos 
            INNER JOIN user_passwords ON user_infos.id = user_passwords.user_id 
            WHERE email = :email';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetchAll();

        if (count($user) == 0) {
            echo "<script>alert('Veuillez vous enregistrer.');</script>";
            return;
        }
        if (count($user) > 1) {
            echo "<script>alert('Veuillez contacter l'administrateur.');</script>";
            return;
        }
        if ($password == $user[0]['mdp']) {
            $_SESSION['userEmail'] = $user[0]["email"];
            $_SESSION['userId'] = $user[0]["id"];
            $cookie_name = "donkey_air_user_id";
            $cookie_value = $user[0]["id"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location:header.php');
        } else {
            echo "<script>alert('Mot de passe ou mail incorrect.');</script>";
            return;
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
        <form action="" method="POST">
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