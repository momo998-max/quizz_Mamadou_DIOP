<?php
// require_once('../traitements/connexion.php');

// //Nous vérifions que l'utilisateur a bien envoyé les informations demandées 
// if (isset($_POST["submit"])) {
//     //Nous allons demander le hash pour cet utilisateur à notre base de données :
//     $pass = $_POST['password'];
//     $pseudo = $_POST['username'];
//     $nom = $_POST['nom'];
//     $photo = 'photo';
//     try {
//         $req = $conn->prepare('INSERT INTO joueur VALUES(?,?,?,?)');
//         $req->execute(array($pseudo, $nom, md5($pass), $photo));
//     } catch (PDOException $e) {
//         printf("Échec de la connexion : %s\n", $e->getMessage());
//         exit();
//     }
// }

?>

<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" method="POST">
                <div class="form-group">
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer votre Nom Complet">
                    <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="user" placeholder="Entrer votre pseudo">
                    <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Password">
                    <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Confirmer le Password">
                    <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                <button type="submit" name='submit' id="but_submit" class="btn btn-primary w-50">S'inscrire</button>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#but_submit").click(function(e) {
            e.preventDefault();
            var nom = $("#nom").val().trim();
            var username = $("#user").val().trim();
            var password = $("#pwd").val().trim();
            var photo = 'joueur.png';
            var role = 'joueur';

            if (username != "" && password != "" && nom != "") {
                $.ajax({
                    url: './data/insertUser.php',
                    type: 'POST',
                    data: {
                        username: username,
                        password: password,
                        nom: nom,
                        photo: photo,
                        role: role

                    },
                    success: function(response) {
                        if (response == "error") {
                            alert("Error lors de l'insertion !");
                        } else {
                            alert("Enregistrement Reussi !");
                            window.location = "index.php";
                        }
                    }
                });
            } else {
                alert('Champ Vide');
            }
        });
    });
</script>