<?php include("../view/inc/header_connexion.php");?>

    <div class="container">

        <div class="row center" style="padding: 30px;">
            <h3 style="font-weight: 700;">Bienvenue sur votre plateforme étudiante</h3>
        </div>

        <div class="row">

            <div class="col s12 m8">

                <div class="card-panel grey lighten-4">
                    <div class="row">
                        <img class="materialboxed col s12" src="../view/img/universite.jpg">
                    </div>
                </div>



            </div>

            <div class="col s12 m4">

                <div class="card-panel grey lighten-4">

                    <div class="row center">
                        <h5 style="font-weight: 400;">Se connecter</h5>
                    </div>

                    <div class="row">
                        <form class="col s12" method="post" action="index.php">

                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="login" name="login" type="text" class="validate">
                                <label class="active" for="login">Identifiant</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">https</i>
                                <input id="mdp" name="mdp" type="password" class="validate ">
                                <label class="active " for="mdp">Mot de passe</label>
                            </div>

                            <div class="row center">
                                <button  style="margin-top: 20px; margin-bottom: -20px;" class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">Connexion</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php include("../view/inc/footer.php");?>


