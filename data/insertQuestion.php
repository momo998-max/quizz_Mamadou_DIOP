<?php
parse_str($_POST['formulaire'], $formulaire);
require_once('connexion.php');

// ====================================================================================
// Recuperation de l'intitulé de la question  et enregistrement dans la table question
// ====================================================================================
$titre = $formulaire['val_quest'];
$point = $formulaire['point_quest'];
$type = $formulaire['type_quest'];
try {
     $req = $conn->prepare('INSERT INTO questions (titre,points,type) VALUES(?,?,?)');
     $req->execute(array($titre, $point, $type));
} catch (PDOException $e) {
     printf("Échec de la connexion : %s\n", $e->getMessage());
     echo "error";
     exit();
}
// ====================================== Fin =========================================

// ====================================================================================
// Recuperation et verification des reponses puis insertion
// ====================================================================================

$last_id = $conn->lastInsertId(); // return value is an integer

if ($formulaire['type_quest'] == "simple") {
     for ($i = 0; $i < (int) $_POST['nbrep']; $i++) {
          if (isset($formulaire["rep_$i"])) {
               $rep = $formulaire["rep_$i"];
               if ($formulaire['radio'] == $i) {
                    $statut = "true";
                    try {
                         $req = $conn->prepare('INSERT INTO reponses (valeur,id_question,statut) VALUES(?,?,?)');
                         $req->execute(array($rep, $last_id, $statut));
                         //echo "good";
                    } catch (PDOException $e) {
                         printf("Échec de la connexion : %s\n", $e->getMessage());
                         echo "error";
                         exit();
                    }
               } else {
                    $statut = "false";
                    try {
                         $req = $conn->prepare('INSERT INTO reponses (valeur,id_question,statut) VALUES(?,?,?)');
                         $req->execute(array($rep, $last_id, $statut));
                         //echo "good";
                    } catch (PDOException $e) {
                         printf("Échec de la connexion : %s\n", $e->getMessage());
                         echo "error";
                         exit();
                    }
               }
          }
     }
     echo "Good";
} elseif ($formulaire['type_quest'] == "multiple") {

     for ($i = 0; $i < (int) $_POST['nbrep']; $i++) {
          if (isset($formulaire["rep_$i"])) {
               $rep = $formulaire["rep_$i"];
               if (isset($formulaire["check_$i"])) {
                    $statut = "true";
                    try {
                         $req = $conn->prepare('INSERT INTO reponses (valeur,id_question,statut) VALUES(?,?,?)');
                         $req->execute(array($rep, $last_id, $statut));
                         //echo "good";
                    } catch (PDOException $e) {
                         printf("Échec de la connexion : %s\n", $e->getMessage());
                         echo "error";
                         exit();
                    }
               } else {
                    $statut = "false";
                    try {
                         $req = $conn->prepare('INSERT INTO reponses (valeur,id_question,statut) VALUES(?,?,?)');
                         $req->execute(array($rep, $last_id, $statut));
                         //echo "good";
                    } catch (PDOException $e) {
                         printf("Échec de la connexion : %s\n", $e->getMessage());
                         echo "error";
                         exit();
                    }
               }
          }
     }
     echo "Good for Multiple";
} else {
     $statut="true";
     $rep=$formulaire['rep_texte'];
     try {
          $req = $conn->prepare('INSERT INTO reponses (valeur,id_question,statut) VALUES(?,?,?)');
          $req->execute(array($rep, $last_id, $statut));
          //echo "good";
     } catch (PDOException $e) {
          printf("Échec de la connexion : %s\n", $e->getMessage());
          echo "error";
          exit();
     }
     echo " Good for Texte";
}

// echo $nbr;
