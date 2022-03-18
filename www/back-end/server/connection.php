<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = "workshop8";

try {
    $db = new PDO("mysql:host=$servername; dbname=$db_name", $username, $password);
    echo 'Connexion réussie !';
    echo "<br>";
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}