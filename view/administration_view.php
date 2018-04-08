<?php include("../view/inc/header.php");

if(isset($data["result"])) {
  // Affichage du message après tentative d'ajout de message (erreur/succès).
  echo "<script>M.toast({html: '{$data["result"]}', classes: 'rounded'});</script>";
}
 ?>


      <title>Etulobby - Administration</title>

      <!-- Navigation bar -->
      <nav>
       <div class="nav-wrapper teal darken-3 ">
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

      <!-- Page -->
      <div class="container">

        <!-- title -->
        <div class="row">
            <div class="row center" style="padding-top: 20px; margin:2px;">
                <h4 style="font-weight: 500;">Panel administration</h4>
            </div>
        </div>

        <div class="divider" style="margin-bottom: 30px;"></div>

        <!-- content -->
        <div class="row">

          <!-- ajout de messages -->
          <div class="col l7">
            <div class="row card-panel grey lighten-4 center-align">

                <div class="row center">
                    <h5 style="font-size:20px; font-weight: 300;">Ajouter un message</h5>
                </div>
                <div class="divider" style="margin-bottom: 30px;"></div>

              <form method="post" action="afficherAdministration.php">
                <div class="row">

                  <div class="input-field col l10 offset-l1">
                    <input id="titre" name="titre" type="text" class="validate">
                    <label class="active" for="nom">Titre</label>
                  </div>

                  <div class="input-field col l10 offset-l1">
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

          <!-- manage élèves -->
          <div class="col l4 offset-l1">
            <div class="row card-panel grey lighten-4">
                <div class="row center">
                    <h5 style="font-size:20px; font-weight: 300;">Actualiser les profils</h5>
                </div>
                <div class="divider" style="margin-bottom: 30px;"></div>



                <div class="row center">

                    <form method="post" action="afficherAdministration.php">

                        <div class="input-field col s12 l10 offset-l1">
                            <select name="idEleve">
                                <option value="" disabled selected>Choisir un élève</option>
                                <?php
                                foreach ($data["eleves"] as $value) {
                                    echo "<option value={$value->id}>{$value->nom} {$value->prenom}</option>";
                                }
                                ?>
                            </select>
                            <label>Utilisateurs</label>
                        </div>

                        <div class="input-field col s12 l10 offset-l1">
                            <select name="numSemestre">
                                <option value="" disabled selected>Choisir un semstre</option>
                                <option value="1">Semestre 1</option>
                                <option value="2">Semestre 2</option>
                                <option value="3">Semestre 3</option>
                                <option value="4">Semestre 4</option>
                            </select>
                            <label>Semestre</label>
                        </div>

                        <div class="row center-align">
                            <button class="btn waves-effect waves-light grey darken-4" type="submit" name="validerSemestre">Valider <i class="material-icons right">check</i></button>
                        </div>

                     </form>
                </div>
          </div>

        </div>
        </div>
      </div>


<?php include("../view/inc/footer.php"); ?>
