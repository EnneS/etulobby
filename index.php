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
      <form method="post" action="login.php">
          <label for="id">Identifiant : </label>
          <input type="text" name="id" id="id" placeholder="identifiant..." value="" /> <br>

          <label for="mdp">Mot de passe : </label>
          <input type="password" name="mdp" id="mdp" placeholder="mot de passe..." value="" /> <br>

          <input type="submit" name="valider" value="Se connecter">
      </form>

      <a href="register.php">S'inscrire</a>
    </div>
  </div>
  </body>
</html>
