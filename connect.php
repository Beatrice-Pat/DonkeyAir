<?php
// conection à la database
$usname = 'root';
$dppass = '';
$host = 'localhost';
$db = 'donkeyair';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $usname, $dppass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        user_login();
    }
}
catch (PDOException $e) {
    echo " Error: " . $e->getMessage();
}







