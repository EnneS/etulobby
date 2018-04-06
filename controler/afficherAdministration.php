<?php
session_start();

// Vérification que l'utilisateur est connecté
if(isset($_SESSION["id"])){

  include_once("../model/DAO_class.php");
  $user = $dao->getUserById($_SESSION["id"]);

  // Vérification que l'utilisateur est bien un professeur
  if($user->rang != 0) {
    if(isset($_POST["message"])){
      echo " fils de pute";
    }


    include_once("../view/administration_view.php");
  } else{ // Sinon retour à l'accueil !
    header('Location: index.php');
  }
} else { // idem
  header('Location: index.php');
}


 ?>
