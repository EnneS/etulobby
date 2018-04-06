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

    $dao = new DAO();

    if (isset($_GET["id"]) && isset($_GET["nom"])){
        $data["idCours"] = $_GET["id"];
        $data["nomCours"] = $_GET["nom"];
    } else {
        header('Location: index.php');
    }

    include_once("../view/cours_view.php");
} else {
    header('Location: index.php');
}

?>
