<?php include("../view/inc/header.php"); ?>

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
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row">

            <div class="row center" style="padding-top: 20px; margin:5px;">
                <h5 style="font-weight: 400;">Modules et cours</h5>
            </div>
        </div>

        <ul class="collapsible popout" data-collapsible="accordion">

        <?php

        foreach($data["modules"] as $module){

            echo '<li>';

            echo "<div class='collapsible-header'><i class='material-icons'>folder</i>M{$module->id} - {$module->nomModule}</div>";

            echo "<div class='collapsible-body'><span>";
            echo "<ul class='collection'>";
            foreach ($module->cours as $cours){

                echo "<li class='collection-item'>";
                echo "<a href='afficherCours.php?id=".$cours->id."&nom=".$cours->nomCours."'>$cours->nomCours</a>";
                echo "</li>";
            }

            echo "</ul>";

            echo "</span></div>";
    
            echo "<div class='collapsible-body'><span style='font-style: italic;'>";
            echo "Enseigné par :";
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
