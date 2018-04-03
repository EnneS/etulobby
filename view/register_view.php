<?php include("../view/inc/header_connexion.php");

if(isset($data["error"])){
    echo $data["error"];
}

?>



    <div class="container">

        <div class="row">
            <h4>S'inscrire</h4>
        </div>

        <div class="row">
            <form class="col s12" method="post" action="register.php">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nom" name="nom" type="text" class="validate">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="prenom" name="prenom" type="text" class="validate">
                        <label for="prenom">Prenom</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="mdp" name="mdp" type="password" class="validate">
                        <label for="mdp">Mot de passe</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="cmdp" name="cmdp" type="password" class="validate">
                        <label for="cmdp">Confirmation du mot de passe</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">S'inscrire !
                    <i class="material-icons right">send</i>
                </button>

                <h5 style="font-style:italic;">Les champs suivis d'un * sont obligatoires.</h5>

            </form>
        </div>

    </div>

