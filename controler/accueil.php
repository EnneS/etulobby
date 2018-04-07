<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 17:12
 */
session_start();

include_once("../model/DAO_class.php");

// Vérification que l'utilisateur est connecté
// Il n'est pas sensé pouvoir accéder à cette page manuellement, on le force à devoir se connecter s'il ne l'est pas
if(isset($_SESSION["id"])){
    $idUser = $_SESSION["id"];

    $data["user"] = $dao->getUserById($idUser);


    // On ajoute le cours si nécessaire
    if (isset($_GET["coursAdd"])){
        if (!$dao->searchCours($idUser,$_GET["coursAdd"])){
            $dao->addCours($idUser,$_GET["coursAdd"]);
            $data["result"] = "Cours ajouté à la liste de révision !";
        } else {
            $data["result"] = "Ce cours est déjà dans la liste de révision.";
        }
    }

    // On supprime le cours si nécessaire
    if (isset($_GET["coursDel"])){
        if ($dao->searchCours($idUser,$_GET["coursDel"])){
            $dao->delCours($idUser,$_GET["coursDel"]);
            $data["result"] = "Cours supprimé de la liste de révision !";
        } else {
          $data["result"] = "Ce cours n\'est pas dans la liste de révision.";
        }
    }

    // Suppression du message si demandé et si l'utilisateur est un professeur.
    if(isset($_GET["messageDel"]) && $data["user"]->rang == 1){
      $idMessage = $_GET["messageDel"];
      $dao->delMessage($idMessage);
      $data["result"] = "Message supprimé !";
    }

    // Récupération de la liste des cours à réviser pour l'utilisateur courant
    $data["coursRevision"] = $dao->getCoursRevisionByIdUser($idUser);

    // Récupération des messages des profs.
    $data["messages"] = $dao->getAllMessage();

    include_once("../view/accueil_view.php");
} else {
    header('Location: index.php');
}
?>
