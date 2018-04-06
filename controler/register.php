<?php
session_start();
include_once("../model/DAO_class.php");

$data;
GLOBAL $data;

// ==========================================
// TO-DO LIST :
// ==========================================
//  * utiliser des htmlspecialchar
//  * encrypter les mdp en md5
// =========================================

// Le bouton validé a été cliqué et les tout les champs sont renseignés.
if(isset($_POST["valider"]) && $_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["mdp"] != "" && $_POST["mdpc"] != ""){
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $mdp = $_POST["mdp"];
  $mdpc = $_POST["mdpc"];
  $login = $dao->newLogin($nom,$prenom);

// Vérification MDP
  // S'ils concordent on inscrit l'utilisateur dans la base de donnée
  // Sinon on renvoie une erreur.
  if($mdp == $mdpc){
    $dao->inscrireUser($nom, $prenom, $mdp, $login);
    $data["result"] = "Inscription réussie ! Redirection...";
    $data["resultId"] = 1;
    $data["login"] = $login;
  } else {
    $data["result"] = "Les mots de passe ne correspondent pas.";
    $data["resultId"] = 0;
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
   $data["result"] = "Un champ est incomplet.";
   $data["resultId"] = 0;
}

if(!isset($_SESSION["id"])){
  include_once("../view/register_view.php");
} else {
  header('Location: index.php');
}
?>
