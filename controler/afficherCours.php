<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 10:22
 */
session_start();
include_once("../model/DAO_class.php");

if(isset($_SESSION["id"])){
  $idUser = $_SESSION["id"];
  $data["user"] = $dao->getUserById($_SESSION["id"]);

  if (isset($_GET["id"]) && isset($_GET["nom"])){
      $data["idCours"] = $_GET["id"];
      $data["nomCours"] = $_GET["nom"];

      // On ajoute le cours si nécessaire
      if (isset($_GET["coursAdd"])){
          if (!$dao->searchCours($idUser,$_GET["coursAdd"])){
              $dao->addCours($idUser,$_GET["coursAdd"]);
              $data["result"] = "Cours ajouté à la liste de révision !";
          } else {
              $data["result"] = "Ce cours est déjà dans la liste de révision.";
          }
      }

  } else {
      header('Location: index.php');
  }

  include_once("../view/cours_view.php");
} else {
    header('Location: index.php');
}

?>
