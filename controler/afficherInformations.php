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
  $data["nom"] = $user->nom;
  $data["prenom"] = $user->prenom;
  $data["semestre"] = "S".$user->numSemestre;

  include_once("../view/informations_view.php"); 
} else {
  header('Location: index.php');
}

 ?>
