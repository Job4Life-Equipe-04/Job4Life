<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = "job4life";

try {
    $db = new PDO("mysql:host=$servername; dbname=$db_name; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}