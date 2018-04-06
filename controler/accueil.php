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

    $dao = new DAO();
    $idUser = $_SESSION["id"];

    //on ajoute le cour si nécessaire
    if (isset($_GET["coursAdd"])){
        if (!$dao->searchCours($idUser,$_GET["coursAdd"])){
            $dao->addCours($idUser,$_GET["coursAdd"]);
        }
    }

    //on supprime le cour si nécessaire
    if (isset($_GET["coursDel"])){
        if ($dao->searchCours($idUser,$_GET["coursDel"])){
            $dao->delCours($idUser,$_GET["coursDel"]);
        }
    }

    $data["coursRevision"] = $dao->getCoursRevisionByIdUser($idUser);

    include_once("../view/accueil_view.php");
} else {
    header('Location: index.php');
}
?>
