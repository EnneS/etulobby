<?php include("../view/inc/header.php"); ?>

    <!--nav bar-->
    <nav>
        <div class="nav-wrapper teal darken-3">
            <div class="brand-logo center">
                <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
                <a href="/" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
            </div>
            <ul class="left hide-on-med-and-down">
                <li><a href="accueil.php">Accueil</a></li>
                <li class="active"><a href="afficherModules.php">Mes cours</a></li>
                <li><a href="afficherInformations.php">Mes informations</a></li>
                <?php if($data["idUser"] == 1) { ?> <li><a href="afficherAdministration.php">Administration</a></li> <?php } ?>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="deconnexion.php?logout='true'">Déconnexion</a></li>
                <li><i style="margin-right: 25px;" class="material-icons">exit_to_app</i></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <!--titre-->
        <div class="row">
            <div class="row center" style="padding-top: 20px; margin:5px;">
                <h5 style="font-weight: 400;">Modules et cours</h5>
            </div>
        </div>

        <!--selecteur semestre-->
<!--        <div class="row">
            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1" href="accueil.php">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label></label>
            </div>
        </div>-->

        <!--affichage modules et cours-->
        <ul class="collapsible popout" data-collapsible="accordion">

        <?php

        foreach($data["modules"] as $module){

            echo '<li>';

            //partie modules
            echo "<div class='collapsible-header'><i class='material-icons'>folder</i>M{$module->id} - {$module->nomModule}</div>";

            //partie cours - nom des cours
            echo "<div class='collapsible-body'><span><ul class='collection'>";
            foreach ($module->cours as $cours){
                echo "<li class='collection-item'>";
                echo "<a style='font-weight:300;' href='afficherCours.php?id=".$cours->id."&nom=".$cours->nomCours."'>$cours->nomCours</a>";
                echo "</li>";
            }
            echo "</ul></span></div>";

            //partie cours - nom des enseignants
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
