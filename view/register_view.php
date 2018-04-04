
<?php include("../view/inc/header_connexion.php");

if(isset($data["result"])) {
  echo "<script>M.toast({html: '{$data["result"]}', classes: 'rounded'});</script>";
}
?>



    <div class="container">

        <div class="row center">
            <h3 style="font-weight: bold;">S'inscrire</h3>
        </div>

        <div class="row">

            <form class="col s12" method="post" action="register.php">

                <div class="row center-align">

                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">person</i>
                        <input id="nom" name="nom" type="text" class="validate">
                        <label class="active" for="nom">Nom</label>
                    </div>

                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="prenom" name="prenom" type="text" class="validate">
                        <label class="active" for="prenom">Prenom</label>
                    </div>

                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">lock</i>
                        <input id="mdp" name="mdp" type="password" class="validate">
                        <label class="active" for="mdp">Mot de passe</label>
                    </div>

                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">lock</i>
                        <input id="mdpc" name="mdpc" type="password" class="validate">
                        <label class="active" for="mdpc">Confirmation du mot de passe</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col s8 offset-s2">
                        <h9 style="font-style:italic;">Les champs suivis d'un * sont obligatoires.</h9>
                    </div>
                </div>

                <div class="row center-align">
                    <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">S'inscrire !
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </form>

        </div>

    </div>

<?php include("../view/inc/footer.php");?>
