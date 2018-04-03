<?php
include_once("/users/info/etu-s3/souliern/public_html/projet/model/DAO_class.php");

if(isset($_POST["valider"]) && $_POST["login"] != "" && $_POST["mdp"] != ""){
  $login = $_POST["login"];
  $mdp = $_POST["mdp"];

  if($dao->verifConnexion($login, $mdp)){
    echo "yessssssssssssss";
  } else {
    echo "putin";
  }

} else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
  $data["error"] = "Un champ est incomplet.";
}

include("view/index_view.php");

?>
