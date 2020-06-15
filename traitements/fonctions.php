<?php
// require_once('./data/connexion.php');
function Connexion($pass,$pseudo){
    // echo "Test1";
    require_once('./data/connexion.php');
    
    $req = $conn->prepare('SELECT * FROM users WHERE login = :pseudo AND mdp = :pass');
    $req->execute(array('pseudo' => $pseudo, 'pass' => md5($pass)));
    // echo "Test";
    $resultat = $req->fetch(PDO::FETCH_ASSOC);
   // var_dump($resultat);
    echo gettype($resultat['role']);
    // echo "fin";
    if ($resultat) {
        // echo '<div class="error-login">Vos identifiants sont incorrects !</div>';
        // return $resultat;
        if ($resultat['role']=="admin") {
            return "admin";
        }else{
            return "joueur";
        }
    } else {
        return "error";
    }
}
