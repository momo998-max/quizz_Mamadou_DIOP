<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Entrer votre pseudo">
                    <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Password">
                    <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div id="message"></div>
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                <button type="submit" id="but_submit" class="btn btn-primary w-50">Submit</button>
                
                    <a href="index.php?lien=inscription_joueur"> Inscription Joueur</a>
                
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#but_submit").click(function(e) {
            e.preventDefault();
            var username = $("#user").val().trim();
            var password = $("#pwd").val().trim();

            if (username != "" && password != "") {
                $.ajax({
                    url: './data/checkUser.php',
                    type: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        var msg = "";
                        if (response == "error") {
                            msg = "Invalid username and password!";
                        } else {
                            window.location = "index.php?lien=" + response;
                        }
                        $("#message").html(msg);
                    }
                });
            } else {
                alert('Champ Vide');
            }
        });
    });
</script>