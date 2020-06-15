<?php
// include "config.php";

$pseudo = $_POST['username'];
$pass = $_POST['password'];
$nom = $_POST['nom'];
$photo = $_POST['photo'];
$role = $_POST['role'];
require_once('../data/connexion.php');

try {
    $req = $conn->prepare('INSERT INTO users (login,nom,mdp,photo,role) VALUES(?,?,?,?,?)');
    $req->execute(array($pseudo, $nom, md5($pass), $photo, $role));
    echo "good";
} catch (PDOException $e) {
    printf("Échec de la connexion : %s\n", $e->getMessage());
    echo "error";
    exit();
}
