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
  $data["idUser"] = $_SESSION["id"];
  $user = $dao->getUserById($data["idUser"]);

  /*on regarde si c'est un eleve ou un prof*/
  if ($user->rang == 0){
      $modules = $dao->getModulesBySemestre($user->numSemestre);
  } else {
      $idModules = $dao->getModulesByEnseignant($user->id);
      //var_dump($idModules);
      $modules = array();
      foreach ($idModules as $idModule){
          array_push($modules,$dao->getModuleById($idModule["idModule"])[0]);
      }

      //var_dump($modules);
      foreach ($modules as $module){
          //var_dump($module);
          $module->enseignants = $dao->getIdEnseignantByModule($module->id);
          $module->cours = $dao->getIdCoursByModule($module->id);
      }

  }

  /*var_dump($modules);*/

  $data["modules"] = $modules;



  include_once("../view/modules_view.php");
} else {
  header('Location: index.php');
}
?>
