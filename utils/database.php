<?php
function connectToDbAndGetPdo(){
    $dbname = 'PowerOfMemory';
    $host = 'localhost';

    // Construction de la chaîne de connexion PDO
    $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";

    // Informations d'identification pour la base de données
    $user = 'root';
    $pass = '';

    $driver_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    // Tentative d'établir la connexion à la base de données en utilisant PDO
    try {
        $pdo = new PDO($dsn, $user, $pass, $driver_options);
        return $pdo;
    } catch (PDOException $e) {
        echo 'La connexion à la base de données a échouée.';
    }
}