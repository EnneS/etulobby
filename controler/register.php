<?php

include_once("../model/DAO_class.php");

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

    $dao->inscrireUser($nom, $prenom, $mdp);
    $data["result"] = "Inscription réussie ! Redirection vers l'accueil...";
    $data["resultId"] = 1;
  } else {
    $data["result"] = "Les mots de passe ne correspondent pas.";
    $data["resultId"] = 0;
}

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
   $data["result"] = "Un champ est incomplet.";
   $data["resultId"] = 0;
}

include_once("../view/register_view.php");
?>
