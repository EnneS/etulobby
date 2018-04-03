<?php
// ==========================================
// TO-DO LIST :
// ==========================================
// * Créer une classe DAO afin d'intéragir avec la base de donnée :
//    - Inscrire un user
//    - Récupérer un user
//
// * Créer une classe User
//
// * Rediriger l'utilisateur vers une page "success.php" qui elle même le redirigera vers "index.php".
//
// * Rendre le tout en MVC
// =========================================

// Le bouton validé a été cliqué et les tout les champs sont renseignés.
if(isset($_POST["valider"]) &&$_POST["id"] != "" && $_POST["mdp"] != "" && $_POST["mdpc"] != ""){
  $id = $_POST["id"];
  $mdp = $_POST["mdp"];
  $mdpc = $_POST["mdpc"];

  // Vérification MDP
  // S'ils concordent on inscrit l'utilisateur dans la base de donnée
  // Sinon on renvoie une erreur.
  if($mdp == $mdpc){

    // A COMPLETER : VOIR TO-DO LIST
    

  } else {
    $error = "Les mots de passe ne correspondent pas.";
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
  $error = "Un champ est incomplet.";
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Etulobby - Inscription</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="page">
    <h1>Etulobby</h1>

    <nav>
  <ul>
    <li>Accueil</li>
    <li>Nav 2</li>
    <li>Nav 3</li>
    <li>Nav 4</li>
  </ul>
    </nav>

    <h2>S'inscrire</h2>

    <?php
    if(isset($error)){
        echo $error;
    }
    ?>

    <div id="form">
      <form action="register.php" method="post">
        <label for="id">* Identifiant :</label>
        <input type="text" name="id" id="id" placeholder=""><br>

        <label for="mdp">* Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" value=""><br>

        <label for="mdpc">* Confirmation du mot de passe :</label>
        <input type="password" name="mdpc" id="mdpc" value=""><br>

        <input type="submit" name="valider" value="S'inscrire"> <br>

        <span style="font-size: 10px">Les champs suivis d'un * sont obligatoires.</span>
      </form>
    </div>
  </div>
  </body>
</html>
