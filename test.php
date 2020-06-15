 
 <?php
    session_start();

    if (empty($_SESSION['membre_id'])) //les membres connecte ne peuvent pas s'inscrire
    {
        /* il faut que toutes les variables du formulaires existent*/
        if (isset($_POST['membre_pseudo']) && isset($_POST['membre_mdp']) && isset($_POST['membre_mail'])) {
            /*il faut que tous les champs soient renseignes*/
            if ($_POST['membre_pseudo'] != "" && $_POST['membre_mdp'] != "" && $_POST['membre_mail'] != "") {
                /*connexion a la BDD*/
                require_once("connexioninscription.inc.php");

                /* on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur*/
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$#", $_POST['membre_mail'])) {
                    /*on verifie si un membre ne possede pas deja le meme pseudo*/
                    $req = $bdd->prepare('SELECT membre_id FROM membres WHERE membre_pseudo = :membre_pseudo');
                    $req->execute(array('membre_pseudo' => $_POST['membre_pseudo']));
                    $nb_resultats_recherche_membre = $req->fetch();

                    if (!$nb_resultats_recherche_membre) /*si il n'y a pas de resultat*/ {
                        /*on crypte le mot de passe*/
                        $membre_mdp = sha1($_POST['membre_mdp']);

                        /*Si le pseudo est libre et l'email valide, alors on enregistre le nouveau membre*/
                        $req = $bdd->prepare('INSERT INTO membres(membre_pseudo,membre_mdp,membre_mail,membre_inscription) VALUES(:membre_pseudo, :membre_mdp, :membre_mail, CURDATE())');
                        $req->execute(array('membre_pseudo' => $_POST['membre_pseudo'], 'membre_mdp' => $membre_mdp, 'membre_mail' => $_POST['membre_mail']));

                        echo "Merci de votre inscription";
                    } else {
                        echo "Un membre possede deja ce pseudo";
                    }
                } else {
                    echo "Votre adresse email n'est pas valide";
                }
            } else {
                echo "Il faut remplir tous les champs";
            }
        } else {
            echo "Une erreur s'est produite";
        }
    } else {
        echo "Vous êtes déjà inscrit, et connecté";
    }




    //Nous vérifions que l'utilisateur a bien envoyé les informations demandées 
    // if (isset($_POST["username"]) && isset($_POST["password"])) {
    //     //Nous allons demander le hash pour cet utilisateur à notre base de données :
    //     $pass = $_POST['password'];
    //     $pseudo = $_POST['username'];
    //     // Test de connexion
    //     $result = Connexion($pass, $pseudo);
    //     echo $result;
    //     //var_dump($result);
    //     if ($result == "error") {
    //         echo "Login ou Mot de Passe Incorrect";
    //     } else {
    //         header("location:index.php?lien=" . $result);
    //     }
    // }

    // 

    ?>