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
// Il n'est pas sensé pouvoir accéder à cette page manuellement mais on le force à devoir se connecter s'il ne l'est pas
if(isset($_SESSION["id"])){

    $data["idUser"] = $_SESSION["id"];

    //on ajoute le cours si nécessaire
    if (isset($_GET["coursAdd"])){
        if (!$dao->searchCours($idUser,$_GET["coursAdd"])){
            $dao->addCours($idUser,$_GET["coursAdd"]);
        }
    }

    //on supprime le cours si nécessaire
    if (isset($_GET["coursDel"])){
        if ($dao->searchCours($idUser,$_GET["coursDel"])){
            $dao->delCours($idUser,$_GET["coursDel"]);
        }
    }

    // Récupération de la liste des cours à réviser pour l'utilisateur courant
    $data["coursRevision"] = $dao->getCoursRevisionByIdUser($data["idUser"]);

    // Récupération des messages des profs.
    $data["messages"] = $dao->getAllMessage();
    
    include_once("../view/accueil_view.php");
} else {
    header('Location: index.php');
}
?>
