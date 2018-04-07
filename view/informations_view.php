<?php include("../view/inc/header.php"); ?>

    <nav>
        <div class="nav-wrapper teal darken-3">
            <div class="brand-logo center">
                <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
                <a href="index.php" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
            </div>
            <ul class="left hide-on-med-and-down">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="afficherModules.php">Mes cours</a></li>
                <li class="active" ><a href="afficherInformations.php">Mes informations</a></li>
                <?php if($data["user"]->rang == 1) { ?> <li><a href="afficherAdministration.php">Administration</a></li> <?php } ?>
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
                <h4 style="font-weight: 500;">Informations personnelles</h4>
            </div>
        </div>

        <div class="divider" style="margin-bottom: 30px;"></div>

        <div class="row">
            <div class="col l6 offset-l3">
                <div class="row card-panel grey lighten-4 ">

                        <div class="col s12 l2 offset-l">
                            <i class="material-icons prefix large">person</i>
                        </div>

                        <div class="col s6 l9 offset-l1">
                            <ul class="collection">
                                <li class="collection-item">Nom : <?php echo $data["user"]->nom; ?></li>
                                <li class="collection-item">Prénom : <?php echo $data["user"]->prenom; ?></li>
                                <?php // On affiche le semestre si != 0 (0 étant attribué pour les profs)
                                if($data["user"]->numSemestre != 0) { ?> <li class="collection-item">Semestre : S<?php echo $data["user"]->numSemestre ?></li> <?php } ?>
                                <li class="collection-item">Groupe : <?php echo $data["groupe"] ?></li>
                            </ul>
                        </div>



                </div>
            </div>
        </div>


    </div>

<?php include("../view/inc/footer.php"); ?>
