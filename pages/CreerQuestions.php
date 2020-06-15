<script>
  $(document).ready(function() {
    $("#ret").click(function() {
      $("#chargement").load("./pages/menu.php");
    });
  });
</script>
<div >
  <div><a role="button" id="ret">Retour</a></div>
  <div>
    <form method="post">
      <label for="val_quest"> Question</label>
      <textarea name="val_quest" id="val_quest" cols="30" rows="2"></textarea>
      <label for="point_quest">Nbre de Points </label>
      <br>
      <input type="number" name="point_quest" id="point_quest">
      <br>
      <br>
      <select name="type_quest" id="type_quest">
        <option value="simple">Question Simple</option>
        <option value="multiple">Question Multiple</option>
        <option value="texte">Question Texte</option>
      </select>

      <input type="button" id="ajout" value="+">
      <br>
      <div id="reponses"></div>
      <div id="message"></div>
      <input type="submit" id="but_submit" value="Enregistrer" />
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {

    var nbRep = 0;
    var choix = "";
    $("#type_quest").change(function(e) {
      choix = $(this).children("option:selected").val();
      nbRep = 0;
      $("#reponses").html("");
    });

    $("#ajout").click(function(e) {

      if (choix == "simple") {
        $("#reponses").append(`<div id='row_${nbRep}'>
          <input type="text" class='rep_${nbRep}' name='rep_${nbRep}'/>
          <input type="radio" id='${nbRep}' name='radio' value='${nbRep}' />
          </div>`);
      } else if (choix == "multiple") {
        $("#reponses").append(`<div id='row_${nbRep}'>
          <input type="text" name='rep_${nbRep}' id='rep_${nbRep}' />
          <input type="checkbox" id='check_${nbRep}' name='check_${nbRep}' value='${nbRep}' />
          </div>`);
      } else if (choix == "texte") {
        $("#reponses").append(`<div id='row_${nbRep}'>
          <input type="text" id='rep_texte' name='rep_texte'>
          </div>`);

      }
      nbRep++;
    });

    $("#but_submit").click(function(e) {
      e.preventDefault();

      // if (username != "" && password != "") {
      $.ajax({
        url: './data/insertQuestion.php',
        type: 'POST',
        data: {
          formulaire: $("form").serialize(),
          nbrep: nbRep
        },
        success: function(response) {
          var msg = "";
          if (response == "error") {
            msg = "Invalid username and password!";
          } else {
            // window.location = "index.php?lien=" + response;
            msg = response;
          }
          $("#message").html(msg);
        }
      });
      // } else {
      //   alert('Champ Vide');
      // }
    });
  });
</script>