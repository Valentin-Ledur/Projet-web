<?php

// Paramètres de connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = '$2y$10$yUG9T7rh6fEop/qMAkEn3.Qw8V2Fn6EFwAa2LDpuNtsYS34znbIim';
$database = "couture_for_fun"; // Nom de la base de données MySQL

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES 'utf8'");
} catch(PDOException $e) {
    echo "Échec de la connexion à la base de données : " . $e->getMessage();
    exit();
}
?>