<?php include("../view/inc/header.php"); ?>

    <nav>
        <div class="nav-wrapper teal darken-3">
            <div class="brand-logo center">
                <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
                <a href="/" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
            </div>
            <ul class="left hide-on-med-and-down">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="afficherModules.php">Mes cours</a></li>
                <li class="active" ><a href="afficherInformations.php">Mes informations</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a style="vertical-align: center; href="deconnxion.php">Déconnexion</a></li>
                <li><i class="material-icons" style="margin-right: 25px;"> exit_to_app</i></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="row center" style="padding-top: 20px; margin:5px;">
                <h5 style="font-weight: 400;">Informations personnelles</h5>
            </div>
        </div>

        <div class="row">
            <div class="col l6 offset-l3">
                <div class="row card-panel grey lighten-4 ">


                        <div class="col s12 l2 offset-l">
                            <i class="material-icons prefix large">person</i>
                        </div>

                        <div class="col s6 l9 offset-l1">
                            <ul class="collection">
                                <li class="collection-item">Nom : <?php echo $data["nom"]; ?></li>
                                <li class="collection-item">Prénom : <?php echo $data["prenom"]; ?></li>
                                <li class="collection-item">Semestre : <?php echo $data["semestre"] ?></li>
                                <li class="collection-item">Groupe : <?php echo $data["groupe"] ?></li>
                            </ul>
                        </div>



                </div>
            </div>
        </div>


    </div>

<?php include("../view/inc/footer.php"); ?>
