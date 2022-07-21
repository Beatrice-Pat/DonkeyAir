<?php
require_once './bddConnexion.php';


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