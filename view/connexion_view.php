<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Etulobby - Accueil</title>
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

    <h2>Se connecter</h2>
    <div id="form">
      <?php if(isset($data["error"])) echo $data["error"]; ?>
      <form method="post" action="index.php">
          <label for="id">Login : </label>
          <input type="text" name="login" id="login" placeholder="identifiant..." value="" /> <br>

          <label for="mdp">Mot de passe : </label>
          <input type="password" name="mdp" id="mdp" placeholder="mot de passe..." value="" /> <br>

          <input type="submit" name="valider" value="Se connecter">
      </form>
      <a href="controler/register.php">S'inscrire</a>
    </div>
  </div>
  </body>
</html>
