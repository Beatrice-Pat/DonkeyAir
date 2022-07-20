<?php



require_once './bddConnexion.php';
require_once('account.php');

//delete exactement comme update on prend l'id du livre avec un GET

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql= "DELETE FROM bookings WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    if($stmt){
        header('location:account.php');
    }
}
