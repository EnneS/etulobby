<?php
session_start();
include_once("../model/DAO_class.php");

if(isset($_POST["valider"]) && $_POST["login"] != "" && $_POST["mdp"] != ""){
  $login = $_POST["login"];
  $mdp = $_POST["mdp"];

  if($dao->verifConnexion($login, $mdp)){
    $_SESSION['id'] = $dao->getUserId($login);
  } else {
    $data["error"] = "Connexion refusée. Login ou mot de passe incorrect.";
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
  $data["error"] = "Un champ est incomplet.";
}

// Vérification que l'utilisateur est connecté (si l'index id de session existe)
// S'il ne l'est pas on affiche la page de connexion
// Sinon on le redirige vers l'accueil.
if(!isset($_SESSION["id"])){
  include("../view/connexion_view.php");
} else {
  header('Location: accueil.php');
}
?>
