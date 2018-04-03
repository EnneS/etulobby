<?php
  require_once("../model/user_class.php");

  $dao = new DAO();

  class DAO {
      // L'objet local PDO de la base de donnée
      private $db;
      // Le type, le chemin et le nom de la base de donnée
      private $database = 'sqlite:../etulobby.db';

      // Constructeur chargé d'ouvrir la BD
      function __construct() {
        $this->db = new PDO($this->database);
      }

      function inscrireUser($nom, $prenom, $semestre, $mdp){
        $stmt = $db->prepare("INSERT INTO USERS VALUES ((SELECT max(id) FROM USERS)
                                                          , ?
                                                          , ?
                                                          , ?
                                                          , ?
                                                          , ?)");

        $login = $nom[1..6] + $prenom[0];
        echo $login;
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(2, $login);
        $stmt->bindParam(2, $mdp);
        $stmt->bindParam(2, $semestre);

        $stmt->execute();
      }
  }
 ?>
