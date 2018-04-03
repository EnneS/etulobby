<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Etulobby - Inscription</title>
    <link rel="stylesheet" href="../css/style.css">

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
    if(isset($data["error"])){
        echo $data["error"];
    }
    ?>

    <div id="form">
      <form action="register.php" method="post">
        <label for="id">* Nom :</label>
        <input type="text" name="nom" id="nom" placeholder=""><br>

        <label for="id">* Prenom :</label>
        <input type="text" name="prenom" id="prenom" placeholder=""><br>

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
