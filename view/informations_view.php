<?php include("../view/inc/header.php"); ?>

    <nav>
        <div class="nav-wrapper teal darken-3">
            <div class="brand-logo center">
                <a><img  src="../view/img/open-book.png" style="margin-bottom:-5px; padding:20px 15px 0 0; height: 50px; width: auto;"></a>
                <a href="#" style="font-weight: bolder; margin-top: -10px;">EtuLobby</a>
            </div>
            <ul class="left hide-on-med-and-down">
                <li><a href="acceuil.php">Acceuil</a></li>
                <li><a href="afficherModules.php">Mes cours</a></li>
                <li class="active" ><a href="afficherInformations.php">Mes informations</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="row center" style="padding: 20px;">
                <h4 style="font-weight: 700;">Informations personnelles</h4>
            </div>
        </div>


        <div class="card-panel grey lighten-4">

            <div class="row">
                <div class="col s12 m2 offset-m2">
                    <i class="material-icons prefix large">person</i>
                </div>

                <div class="col s12 m6">
                    <ul class="collection">
                        <li class="collection-item">Nom :</li>
                        <li class="collection-item">Prénom :</li>
                        <li class="collection-item">Semestre :</li>
                        <li class="collection-item">XXX</li>
                    </ul>

                </div>
            </div>


        </div>

    </div>

<?php include("../view/inc/footer.php"); ?>