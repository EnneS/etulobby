<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 17:12
 */
session_start();
include_once("../model/DAO_class.php");

if(isset($_SESSION["id"])){
  $user = $dao->getUserById($_SESSION["id"]);
  $data["user"] = $user;

    // si l'utilisateur fait une recherche ou non
    //if (!isset($_GET["p"])){

        // si c'est un eleve
        if ($user->rang == 0){

            // on affiche les options de recherches
            $data["sectionRecherche"] = true;

            // si c'est une recherche precise
            if (isset($_POST["rechercherModule"])){

                if(isset($_POST["numSemestre"])){
                    $numSemestre = $_POST["numSemestre"];
                } else {
                    $numSemestre = $user->numSemestre;
                }
                $modules = $dao->getModulesBySemestre($numSemestre);

                if ($_POST["nbModule"] > sizeof($modules)){
                    $modulesAffiches = sizeof($modules);
                } else {
                    $modulesAffiches = $_POST["nbModule"];
                }

                //$data["nbPage"] = floor(sizeof($modules) / $modulesAffiches + 1);

            // sinon on charge la page par defauts (correspondant a son semestre et tous les modules)
            } else {
                $modules = $dao->getModulesBySemestre($user->numSemestre);
                $modulesAffiches = sizeof($modules);
                //$data["nbPage"] = 1;
            }

        // si c'est un professeur
        } else {

            // on masque les options de recherches
            $data["sectionRecherche"] = false;

            $idModules = $dao->getModulesByEnseignant($user->id);
            $modules = array();

            foreach ($idModules as $idModule){
                array_push($modules,$dao->getModuleById($idModule["idModule"])[0]);
            }

            foreach ($modules as $module){
                $module->enseignants = $dao->getIdEnseignantByModule($module->id);
                $module->cours = $dao->getIdCoursByModule($module->id);
            }

            $modulesAffiches = sizeof($modules);

        }

        $data["modules"] = $modules;
        $data["nbModules"] = $modulesAffiches;
        $data["offset"] = 0;

    // si l'utilisateur charge une page particuliere
    //} else {
    //    $data["offset"] = ($_GET["p"]-1)*$data["nbModules"];
    //}

    //var_dump($data["modules"]);

    include_once("../view/modules_view.php");
} else {
  header('Location: index.php');
}
?>
