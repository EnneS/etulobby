<?php
session_start();
if(isset($_GET["logout"])) {
echo "deco";
unset($_SESSION["id"]);
}
header('Location: index.php');
?>
