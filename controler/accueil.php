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
  include_once("../view/accueil_view.php");
} else {
  header('Location: index.php');
}
?>
