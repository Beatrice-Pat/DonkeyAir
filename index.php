<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Air</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="http://localhost:8000/index.php#">Donkey Air</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="http://localhost:8000/ajout_livre.php#">Connexion</a>
                        </div>
                    </div>
                </div>
            </nav>   
        </header>

        <br>
        
        <?php
            require_once 'connec.php';

            try{
                $PDO = NEW PDO(DB_DSN,DB_USER,DB_PASS);
            }
            catch(pdoexception $pe)
            {
                echo 'ERREUR : '.$pe->getMessage();
            }

            if(isset($_POST['save']))
            {
                $name = $_POST['firstname'];
                $firstname= $_POST['lastname']; 

                $sql = "INSERT INTO 'usersdetails' ('firstname', 'lastname',) VALUES (:nom, :prenom,)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':email', $email);
                    $stmt->execute();
            }
            
            $query = $PDO->query('SELECT usersdetails.*, users.mdp FROM usersdetails LEFT JOIN users ON usersdetails.id = users.userdetail_id'); 
            $posts = $query->fetchAll();   
            echo "<table>";
            echo "<tr><th>Id</th><th>Prénom</th><th>Nom</th><th>E-mail</th><th>mdp</th>" ;
            foreach ($posts as $row){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['mdp'] . "</td>";
                echo "</tr>";
             
            }
            echo "</table>";
            echo "<br>";

            $query = $PDO->query('SELECT * FROM flights');
            $posts = $query->fetchAll();
            echo "<table>";
            echo "<tr><th>Départ de</th><th>Arrivée à</th><th>Date</th><th>Horaires</th><th>Durée<br>du<br>voyage</th><th>Numéro<br>de<br>vol</th><th>Prix</th></tr>" ;
            foreach ($posts as $row){
                echo "<tr>";
                echo "<td>" . $row['from'] . "</td>";
                echo "<td>" . $row['to'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['schedule'] . "</td>";
                echo "<td>" . $row['flightduration'] . "</td>";
                echo "<td>" . $row['volnb'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
                
            }
            //echo "</table>";
            //echo "<br>";

            //$query = $PDO->query('SELECT * FROM book');
            //$posts = $query->fetchAll();
            //echo "<table>";
            //echo "<tr><th>Id</th><th>Title</th><th>Date</th><th>id_author</th></tr>" ;
            //foreach ($posts as $row){
                //echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                //echo "<td>" . $row['title'] . "</td>";
                //echo "<td>" . $row['date'] . "</td>";
                //echo "<td>" . $row['id_author'] . "</td>";
                //echo "</tr>";
            //}
            //echo "</table>";
            //echo "<br>";
        ?>

        <?php
            //$query = $PDO->query('SELECT * FROM season');
            //$posts = $query->fetchAll();
            //echo "<table>";
            //echo "<tr><th>Id</th><th>Title</th><th>Date</th><th>id_book</th></tr>" ;
            //foreach ($posts as $row){
                //echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                //echo "<td>" . $row['title'] . "</td>";
                //echo "<td>" . $row['date'] . "</td>";
                //echo "<td>" . $row['id_book'] . "</td>";
                //echo "</tr>";
            //}
            //echo "</table>";
            //echo "<br>";

            //$query = $PDO->query('SELECT * FROM chapter');
            //$posts = $query->fetchAll();
            //echo "<table>";
            //echo "<tr><th>Id</th><th>Title</th><th>id_book</th><th>id_season</th></tr>" ;
            //foreach ($posts as $row){
                //echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                //echo "<td>" . $row['title'] . "</td>";
                //echo "<td>" . $row['id_book'] . "</td>";
                //echo "<td>" . $row['id_season'] . "</td>";
                //echo "</tr>";
            //}
            //echo "</table>";
            //echo "<br>";
        ?>

    </body>
</html>