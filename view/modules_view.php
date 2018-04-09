<?php include("../view/inc/header.php"); ?>

      <title>Etulobby - Modules</title>

      <!-- Navigation bar -->
      <nav>
        <div class="nav-wrapper teal darken-3 ">
          <div class="brand-logo center">
            <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
            <a href="index.php" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
          </div>
          <ul class="left hide-on-med-and-down">
            <li><a href="accueil.php">Accueil</a></li>
            <li class="active"><a href="afficherModules.php">Mes cours</a></li>
            <li><a href="afficherInformations.php">Mes informations</a></li>
            <?php if($data["user"]->rang == 1) { ?> <li><a href="afficherAdministration.php">Administration</a></li> <?php } ?>
          </ul>
          <ul class="right hide-on-med-and-down">
            <li><a href="deconnexion.php?logout='true'">Déconnexion</a></li>
            <li><i style="margin-right: 25px;" class="material-icons">exit_to_app</i></li>
          </ul>
        </div>
      </nav>

      <!-- Page -->
      <div class="container">

        <!--titre-->
        <div class="row">
          <div class="row center" style="padding-top: 20px; margin:2px;">
            <h4 style="font-weight: 500;">Mes cours</h4>
          </div>
        </div>

          <div class="divider" style="margin-bottom: 30px;"></div>

          <?php if ($data["sectionRecherche"]) { ?>


          <div class="row">

              <div class="col l3">

                  <div class="row center">
                      <h5 style="font-size:20px; font-weight: 300;">Options de recherche</h5>
                  </div>

                  <form method="post" action="afficherModules.php">

                      <div class="row" center>
                          <div class="input-field col s12">
                              <select name="numSemestre">
                                  <option value="" disabled selected>Choisir un semestre</option>
                                  <option value="1">Semestre 1</option>
                                  <option value="2">Semestre 2</option>
                                  <option value="3">Semestre 3</option>
                                  <option value="4">Semestre 4</option>
                              </select>
                              <label>Semestre</label>
                          </div>

                      </div>

                      <div class="row" center>
                          <div class="col s12">
                              <label>Nombre de module a afficher</label>
                              <p class="range-field disabled">
                                  <input type="range" name="nbModule" min="0" max="15" />
                              </p>
                          </div>
                      </div>

                      <div class="row center-align">
                          <button class="btn waves-effect waves-light grey darken-4" type="submit" name="rechercherModule">Rechercher<i class="material-icons right">search</i></button>
                      </div>
                  </form>

              </div>

              <?php } ?>

              <div class="col l8 offset-l1">

                  <!--affichage modules -->
                  <ul class="collapsible popout" data-collapsible="accordion">
                      <?php

                      for ($i=0; $i < $data["nbModules"]; $i++){

                          $module = $data["modules"][$i];

                          echo '<li>';

                          // ID et Nom du module
                          echo "<div class='collapsible-header'><i class='material-icons'>folder</i>M{$module->id} - {$module}</div>";

                          // Liste des cours du module
                          echo "<div class='collapsible-body'><span><ul class='collection'>";

                          foreach ($module->cours as $cours){
                              echo "<li class='collection-item'>";
                              echo "<a style='font-weight:300;' href='afficherCours.php?id=".$cours->id."&nom=".$cours."'>$cours</a>";
                              echo "</li>";
                          }
                          echo "</ul></span></div>";

                          // Liste des enseignants du modules
                          echo "<div class='collapsible-body'><span style='font-style: italic;'> Enseigné par :";
                          foreach ($module->enseignants as $enseignant){
                              echo " $enseignant->nom $enseignant->prenom |";
                          }
                          echo "</span></div>";

                          echo '</li>';

                      }
                      ?>
                  </ul>

              </div>

          </div>

          <div class="divider" style="margin-bottom: 30px;"></div>

          <div class="row center">

              <ul class="pagination">

              <?php

              /*

              echo "<li class='waves-effect'><a href=''><i class='material-icons'>chevron_left</i></a></li>";

              for ($i = 1; $i <= $data["nbPage"]; $i++){
                  echo "<li class=''><a href='afficherModules.php?p={$i}'>{$i}</a></li>";
              }

              echo "<li class='waves-effect'><a href=''><i class='material-icons'>chevron_right</i></a></li>";

              */

              ?>

              </ul>

          </div>






      </div>

<?php include("../view/inc/footer.php"); ?>
