<?php

include_once("/users/info/etu-s3/souliern/public_html/projet/model/DAO_class.php");

$data;
GLOBAL $data;

// ==========================================
// TO-DO LIST :
// ==========================================
// * Créer une classe DAO afin d'intéragir avec la base de donnée :
//    - Récupérer un user
//
//
// * Rediriger l'utilisateur vers une page "success.php" qui elle même le redirigera vers "index.php".
//
// =========================================

// Le bouton validé a été cliqué et les tout les champs sont renseignés.
if(isset($_POST["valider"]) && $_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["mdp"] != "" && $_POST["mdpc"] != ""){
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $mdp = $_POST["mdp"];
  $mdpc = $_POST["mdpc"];

  // Vérification MDP
  // S'ils concordent on inscrit l'utilisateur dans la base de donnée
  // Sinon on renvoie une erreur.
  if($mdp == $mdpc){

    // A COMPLETER : VOIR TO-DO LIST
    $dao->inscrireUser($nom, $prenom, $mdp);

  } else {
    $data["error"] = "Les mots de passe ne correspondent pas.";
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
  $data["error"] = "Un champ est incomplet.";
}


include_once("/users/info/etu-s3/souliern/public_html/projet/view/register_view.php");
?>
