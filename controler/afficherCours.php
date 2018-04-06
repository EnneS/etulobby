<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 10:22
 */
session_start();
include_once("model/DAO_class.php");

if(isset($_SESSION["id"])){

    $dao = new DAO();

    if (isset($_GET["id"])){
        $data["idCours"] = $_GET["id"];
    } else {
        header('Location: index.php');
    }

    include_once("../view/cours_view.php");
} else {
    header('Location: index.php');
}

?>
