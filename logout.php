<?php
//logout:on stop la session avec un commande de session_destroy() et envoie le user sur l'home page que j'ai nommé login.php
session_start();
session_destroy();
header('location:login.php');
