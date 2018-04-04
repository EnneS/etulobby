<?php
session+

include_once("../model/DAO_class.php");

if(isset($_POST["valider"]) && $_POST["login"] != "" && $_POST["mdp"] != ""){
  $login = $_POST["login"];
  $mdp = $_POST["mdp"];

  if($dao->verifConnexion($login, $mdp)){
    ;
  } else {
    $data["error"] = "Connexion refusée. Login ou mot de passe incorrect.";
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
  $data["error"] = "Un champ est incomplet.";
}

include("../view/connexion_view.php");

?>
