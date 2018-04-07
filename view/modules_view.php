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

        <!--affichage modules -->
        <ul class="collapsible popout" data-collapsible="accordion">
          <?php
          foreach($data["modules"] as $module){
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

<?php include("../view/inc/footer.php"); ?>
