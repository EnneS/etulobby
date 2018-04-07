<?php include("../view/inc/header.php"); ?>

    <!--nav bar-->
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
                <?php if($data["idUser"] == 1) { ?> <li><a href="afficherAdministration.php">Administration</a></li> <?php } ?>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="deconnexion.php?logout='true'">Déconnexion</a></li>
                <li><i style="margin-right: 25px;" class="material-icons">exit_to_app</i></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <!--bouton options-->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large black">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a href="../data/<?php echo $data['idCours'] ?>.pdf" download="<?php echo $data['nomCours']?>"class="btn-floating black tooltipped" data-position="left" data-tooltip="Télécharger le cours"><i class="material-icons">cloud_download</i></a></li>
                <li><a href="accueil.php?coursAdd=<?php echo $data['idCours'] ?>" class="btn-floating black tooltipped" data-position="left" data-tooltip="Ajouter à la liste de révision"><i class="material-icons">add</i></a></li>
            </ul>
        </div>

        <!--nom cours-->
        <div class="row">
            <div class="row center" style="padding-top: 20px; margin:5px;">
                <h5 style="font-weight: 400;"><?php echo $data['nomCours']?></h5>
            </div>
        </div>

        <!--affichage cours-->
        <div class="row center">
            <div class="col l12">
                <object form="" type="application/pdf" width="1000px" height="700px" data="../data/<?php echo $data['idCours'] ?>.pdf"></object>
            </div>
        </div>


    </div>

<?php include("../view/inc/footer.php"); ?>
