<?php include("../view/inc/header.php");

if(isset($data["result"])) {
  // Affichage du message après tentative d'ajout de message (erreur/succès).
  echo "<script>M.toast({html: '{$data["result"]}', classes: 'rounded'});</script>";
}
 ?>

<nav>
    <div class="nav-wrapper teal darken-3">
        <div class="brand-logo center">
            <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
            <a href="/" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
        </div>
        <ul class="left hide-on-med-and-down">
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="afficherModules.php">Mes cours</a></li>
            <li><a href="afficherInformations.php">Mes informations</a></li>
            <li class="active"><a href="afficherAdministration.php">Administration</a></li>

        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="deconnexion.php?logout='true'">Déconnexion</a></li>
            <li><i style="margin-right: 25px;" class="material-icons">exit_to_app</i></li>
        </ul>
    </div>
</nav>

<div class="container">
  <div class="row center">
      <h3 style="font-weight: bold;">Panel d'Administration</h3>
  </div>

  <div class="row">
      <form class="col s12" method="post" action="afficherAdministration.php">

          <div class="row center-align">
                <div class="row">

                  <div class="input-field col s8 offset-s2">
                      <input id="titre" name="titre" type="text" class="validate">
                      <label class="active" for="nom">Titre</label>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <textarea id="message" name="message" class="materialize-textarea"></textarea>
                    <label for="textarea1">Message</label>
                  </div>
                </div>

                <div class="center-align">
                    <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">Envoyer
                        <i class="material-icons right">send</i>
                    </button>
                </div>

              </form>

          </div>
  </div>
</div>

<?php include("../view/inc/footer.php"); ?>
