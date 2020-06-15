<?php


$servername = 'localhost';
$username = 'root';
$password = 'maimouna';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=quizz", $username, $password);
    } catch (PDOException $e) {
        printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }


?>