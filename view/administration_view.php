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
            <a href="index.php" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
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
    <div class="row">

        <div class="row center" style="padding-top: 20px; margin:2px;">
            <h4 style="font-weight: 500;">Panel administration</h4>
        </div>
    </div>

    <div class="divider" style="margin-bottom: 30px;"></div>

    <div class="row">

      <div class="col l7">
            <div class="row card-panel grey lighten-4 center-align">
              <h5 style="font-weight: 500;">Ajouter un message</h4>

                <form method="post" action="afficherAdministration.php">
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="titre" name="titre" type="text" class="validate">
                            <label class="active" for="nom">Titre</label>
                        </div>
                        <div class="input-field col s8 offset-s2">
                            <textarea id="message" name="message" class="materialize-textarea"></textarea>
                            <label for="textarea1">Message</label>
                        </div>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">Envoyer
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      <div class="col l4 offset-l1">
        <div class="row card-panel grey lighten-4">
          <h5 style="font-weight: 500; ">Actualiser les infos d'un élève</h4>

          <form method="post" action="afficherAdministration.php">
            <div class="col s12 m6">

              <label>Utilisateurs</label>
              <select name="idEleve" class="browser-default">
                <option value="" disabled selected>Choisir l'élève</option>
                <?php
                  foreach ($data["eleves"] as $value) {
                    echo "<option value={$value->id}>{$value->nom} {$value->prenom}</option>";
                  }
                ?>
              </select>

              <label>Semestre</label>
              <select name="numSemestre" class="browser-default">
                <option value="" disabled selected>Choisir un semestre</option>
                <option value="1">Semestre 1</option>
                <option value="2">Semestre 2</option>
                <option value="3">Semestre 3</option>
                <option value="4">Semestre 4</option>
              </select>

              <div class="row center-align"></div>

              <button class="btn waves-effect waves-light grey darken-4" type="submit" name="validerSemestre">Valider <i class="material-icons right">check</i></button>

            </div>
          </form>

      </div>
    </div>

  </div>
</div>


<?php include("../view/inc/footer.php"); ?>
