<?php include("../view/inc/header.php");

if(isset($data["result"])) {
  // Affichage du message après tentative d'ajout de message (erreur/succès).
  echo "<script>M.toast({html: '{$data["result"]}', classes: 'rounded'});</script>";
}

$coursRevision = $data["coursRevision"]; ?>

<nav>
    <div class="nav-wrapper teal darken-3">
        <div class="brand-logo center">
            <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
            <a href="/" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
        </div>
        <ul class="left hide-on-med-and-down">
            <li class="active" ><a href="accueil.php">Accueil</a></li>
            <li><a href="afficherModules.php">Mes cours</a></li>
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

    <div class="row">
        <div class="row center" style="padding-top: 20px; margin:2px;">
            <h4 style="font-weight: 500;">Mon dashboard</h4>
        </div>
    </div>

    <div class="divider" style="margin-bottom: 30px;"></div>

    <div class="row">

        <div class="col l7">
            <div class="row card-panel grey lighten-4 ">
                <ul class="collection with-header">
                    <li class="collection-header"><h5 style="font-size:20px; font-weight: 300;">Liste de révision<span class="new badge" data-badge-caption="cours"><?php echo sizeof($coursRevision) ?></span></h5></li>

                    <?php

                    foreach ($coursRevision as $cours){
                        echo "<li class='collection-item avatar'>";
                        echo "<i class='material-icons circle'>import_contacts</i>";
                        echo "<span class='title'><a style='color: !important;' href='afficherCours.php?id={$cours[0]->id}&nom={$cours[0]->nomCours}'>".$cours[0]->nomCours."</a></span>";
                        echo "<p>Module M{$cours[0]->numModule}</p>";
                        echo "<a href='accueil.php?coursDel={$cours[0]->id}' class='secondary-content tooltipped' data-position='bottom' data-tooltip='Supprimer de la liste'><i class=\"material-icons\">clear</i></a>";
                        echo "</li>";
                    }

                    ?>

                </ul>

            </div>
        </div>

        <div class="col l4 offset-l1">
            <div class="row card-panel grey lighten-4 ">
                <div class="row center">
                    <h5 style="font-size:20px; font-weight: 300;">Informations</h5>
                </div>

                <ul class="collapsible ">
                  <?php
                  foreach ($data["messages"] as $message) {
                    echo "<li class='active'>";
                    echo "<div class='collapsible-header'><i class='material-icons'>warning</i>".$message->titre."</div>";
                    echo "<div class='collapsible-body'><span>".$message->message."</span></div>";
                    echo"</li>";
                  }
                   ?>
                </ul>

            </div>
        </div>

    </div>




</div>

<?php include("../view/inc/footer.php"); ?>
