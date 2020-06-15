<script>
  $(document).ready(function() {
    $("#cquest").click(function() {
      $("#chargement").load("./pages/CreerQuestions.php");
    });
    $("#lquest").click(function() {
      $("#chargement").load("./pages/listequestions.php");
    });
    $("#cadmin").click(function() {
      $("#chargement").load("./pages/test1.php");
    });
    $("#ljoueurs").click(function() {
      $("#chargement").load("./pages/listerjoueurs.php");
    });
  });
</script>
<div id="chargement" class=" " style="height:400px;">
  <div class="container  w-75 h-100 mt-5" >
    <div class="row h-100 justify-content-center align-items-center">
      <div class="w-50 h-50 float-left m-auto">
        <button class="btn btn-primary w-75 h-75 " id="cquest">
          <svg class="bi bi-plus float-left" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
          </svg>
          <h2> Créer question</h2>
        </button>
      </div>
      <div class="w-50 h-50 float-right m-auto">
        <button class="btn btn-success w-75 h-75 float-right" id="lquest">
          <svg class="bi bi-list-task float-left" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
          </svg>
          <h3> Liste questions</h3>
        </button>
      </div>
      <div class="w-50 h-50 float-left mt-5">
        <button class="btn btn-success w-75 h-75 " id="cadmin">
          <svg class="bi bi-plus float-left" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
          </svg>
          <h2> Créer Admin</h2>
        </button>
      </div>
      <div class="w-50 h-50 float-right  mt-5">
        <button class="btn btn-danger w-75 h-75 float-right" id="ljoueurs">
          <svg class="bi bi-list-task float-left" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
          </svg>
          <h3>Lister Joueurs</h3>
        </button>
      </div>
    </div>

  </div>
</div>