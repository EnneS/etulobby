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
                <li><a href="afficherInformations.php">Mes informations</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="row center" style="padding: 20px;">
                <h4 style="font-weight: 700;"><?php ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col l10 offset-l1">
                <object width="auto" height="auto" data="../data/<?php echo data['idCours'] ?>.pdf"></object>
            </div>
        </div>


    </div>

<?php include("../view/inc/footer.php"); ?>