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
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

