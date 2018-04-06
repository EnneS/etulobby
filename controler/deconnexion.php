<?php
session_start();
if(isset($_GET["logout"])) {
unset($_SESSION["id"]);
}
header('Location: index.php');
//include_once("../view/connexion_view.php");
?>
