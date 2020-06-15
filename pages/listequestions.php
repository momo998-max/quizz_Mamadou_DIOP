<script>
    $(document).ready(function() {
        $("#ret").click(function() {
            $("#chargement").load("./pages/menu.php");
        });
    });
</script>
<div id="affichage">
    <div><a role="button" id="ret">Retour</a></div>
    <?php
    require_once('../data/connexion.php'); // Connexion à la base de données
    $req = $conn->query("SELECT id,titre,points,type FROM questions ");
    $req->execute();

    while ($data = $req->fetch()) {
        echo  "<h1>".$data['titre']."</h1>";
        $req1 = $conn->query("SELECT valeur,statut FROM reponses where id_question=".$data['id']." ");
        $req1->execute();
        if ($data['type']=="simple") {
            while ($data1 = $req1->fetch()){
                if ($data1['statut']=="true") {
                    echo "<input type='radio' checked>".$data1['valeur']."</input> ";
                } else {
                    echo "<input type='radio'>".$data1['valeur']."</input> ";
                }
                
            }
            echo "<br/>=================</BR>";
        } elseif ($data['type']=="multiple") {
            while ($data1 = $req1->fetch()){
                if ($data1['statut']=="true") {
                    echo "<input type='checkbox' checked>".$data1['valeur']."</input> ";
                } else {
                    echo "<input type='checkbox'>".$data1['valeur']."</input> ";
                }
                
            }
            echo "<br/>=================</BR>";
        }else {
            while ($data1 = $req1->fetch()){
                  echo "<input type='text' value='".$data1['valeur']."'/> ";
                
                
            }
        }
        
        
    }
    ?>
</div>