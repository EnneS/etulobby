<?php include("../view/inc/header.php"); ?>

    <nav>
        <div class="nav-wrapper teal darken-3">
            <a href="#!" class="brand-logo center" style="font-weight: bolder;">EtuLobby</a>
            <ul class="left hide-on-med-and-down">
                <li><a href="acceuil.php">Acceuil</a></li>
                <li class="active"><a href="afficherModules.php">Mes cours</a></li>
                <li><a href="afficheInformations.php">Mes informations</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row center">
            <h3 style="font-weight: bold;">Listes des modules</h3>
        </div>

        <?php

        //foreach ($data as )

        ?>

        <ul class="collapsible popout" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">folder</i>M3201</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">folder</i>M3202</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">folder</i>M3203</div>
                <div class="collapsible-body"><span>Blanco la grosse pute.</span></div>
            </li>
        </ul>

    </div>

<?php include("../view/inc/footer.php"); ?>

