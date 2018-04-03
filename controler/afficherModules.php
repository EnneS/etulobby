<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 17:12
 */

include_once("../model/DAO_class.php");

$dao = new DAO();


function getModules(){
    $req = "SELECT * FROM module";
    $stmt = $this->db->prepare($req);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
}

include_once("../view/modules_view.php"); ?>