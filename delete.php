<?php
require_once 'db_connexion_info.php';

try {
	$pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
	echo $e->getMessage();
}

if(isset($_GET['deleteid'])){
    global $pdo;
    $id = $_GET['deleteid'];
    $query= 'DELETE FROM bookings WHERE id = :id';
    $statement= $pdo->prepare($query);
    $statement->bindValue(':id', $id, \PDO::PARAM_STR);
    $statement->execute();
    if($statement){
        header('Location:account.php');
    }
}