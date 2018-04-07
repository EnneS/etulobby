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

  /*on regarde si c'est un eleve ou un prof*/
  if ($user->rang == 0){
      $modules = $dao->getModulesBySemestre($user->numSemestre);
  } else {
      $idModules = $dao->getModulesByEnseignant($user->id);
      $modules = array();
      foreach ($idModules as $idModule){
          array_push($modules,$dao->getModuleById($idModule["idModule"])[0]);
      }

      foreach ($modules as $module){
          $module->enseignants = $dao->getIdEnseignantByModule($module->id);
          $module->cours = $dao->getIdCoursByModule($module->id);
      }

  }

  $data["modules"] = $modules;

  include_once("../view/modules_view.php");
} else {
  header('Location: index.php');
}
?>
