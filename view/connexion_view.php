<?php include("../view/inc/header_connexion.php");?>

    <div class="container">

        <div class="row">
            <h4>Se connecter</h4>
        </div>

        <div class="row">
            <form class="col s12" method="post" action="index.php">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="login" name="login" type="text" class="validate">
                        <label for="login">Identifiant</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input id="mdp" name="mdp" type="password" class="validate">
                        <label for="mdp">Mot de passe</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">Se connecter
                    <i class="material-icons right">send</i>
                </button>

            </form>
        </div>

    </div>

<?php include("../view/inc/footer.php");?>


