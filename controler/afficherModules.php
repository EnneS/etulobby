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
  $modules = $dao->getModulesBySemestre($user->numSemestre);
  $data["modules"] = $modules;



  include_once("../view/modules_view.php");
} else {
  header('Location: index.php');
}
?>
