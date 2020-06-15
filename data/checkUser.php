<?php
// include "config.php";

$pseudo = $_POST['username'];
$pass = $_POST['password'];

require_once('../data/connexion.php');

$req = $conn->prepare('SELECT * FROM users WHERE login = :pseudo AND mdp = :pass');
$req->execute(array('pseudo' => $pseudo, 'pass' => md5($pass)));
// echo "Test";
$resultat = $req->fetch(PDO::FETCH_ASSOC);
if ($resultat) {
    if ($resultat['role'] == "admin") {
        echo "admin";
    } else {
        echo "joueur";
    }
} else {
    echo "error";
}

?>
