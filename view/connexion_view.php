<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../view/css/materialize.min.css"  media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">

        <link rel="stylesheet" href="style.css">
        <title>Etulobby - Accueil</title>
    </head>

    <body>

    <div id="page">

        <nav>
            <div class="nav-wrapper teal darken-3">
                <a href="#" class="brand-logo center">EtuLobby</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="sass.html">nav1</a></li>
                    <li><a href="badges.html">nav2</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <form class="col s12" method="post" action="index.php">

                    <div class="row">
                        <h4>Se connecter</h4>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">Identifiant</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">https</i>
                            <input id="icon_password" type="tel" class="validate">
                            <label for="icon_password">Mot de passe</label>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light grey darken-4" type="submit" name="valider">Se connecter
                        <i class="material-icons right">send</i>
                    </button>

                </form>
            </div>

        </div>


            <!--   <div id="form">
                  <form method="post" action="login.php">

                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">Identifiant</label>


                      <label for="id">Identifiant : </label>
                      <input type="text" name="id" id="id" placeholder="identifiant..." value="" /> <br>

                      <label for="mdp">Mot de passe : </label>
                      <input type="password" name="mdp" id="mdp" placeholder="mot de passe..." value="" /> <br>


                  </form>
                  <a href="controler/register.php">S'inscrire</a>

            </div>

        </div>-->




    <footer class="page-footer teal darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <img src="view/img/header-logo.png">
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright EtuLobby
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="view/js/materialize.min.js"></script>
    </body>
</html>
