<?php
session_start();

// Vérification que l'utilisateur est connecté
if(isset($_SESSION["id"])){

  include_once("../model/DAO_class.php");
  $user = $dao->getUserById($_SESSION["id"]);

  // Vérification que l'utilisateur est bien un professeur
  if($user->rang != 0) {

    // ================================================
    // Ajout de messages

    if(isset($_POST["valider"]) && $_POST["message"] != "" && $_POST["titre"]){
      $message = $_POST["message"];
      $titre = $_POST["titre"];

      $dao->addMessage($titre, $message);
      $data["result"] = "Message ajouté !";

    } else if(isset($_POST["valider"])) { // Le bouton validé a été cliqué et un champ est incomplet.
       $data["result"] = "Un champ est incomplet.";
    }

    // ===============================================
    // Manage élèves
    $data["eleves"] = $dao->getEleves();

    if(isset($_POST["validerSemestre"]) && isset($_POST["idEleve"]) && isset($_POST["numSemestre"])){
      $idEleve = $_POST["idEleve"];
      $numSemestre = $_POST["numSemestre"];

      $dao->setSemestre($idEleve, $numSemestre);
      $data["result"] = "Semestre actualisé !";

    } else if(isset($_POST["validerSemestre"])) { // Le bouton validé a été cliqué et un champ est incomplet.
       $data["result"] = "Un champ n\'est pas renseigné.";
    }

    include_once("../view/administration_view.php");
  } else{ // Sinon retour à l'accueil !
    header('Location: index.php');
  }
} else { // idem
  header('Location: index.php');
}


 ?>
