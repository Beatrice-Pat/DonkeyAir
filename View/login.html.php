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