<?php
  $dao = new DAO();
  class DAO {
      // L'objet local PDO de la base de donnée
      private $db;
      // Le type, le chemin et le nom de la base de donnée
      private $database = '../model/db/etulobby.db';

      // Constructeur chargé d'ouvrir la BD
      function __construct() {
     //   $this->db = new PDO($this->database);
      }

      function inscrireUser($nom, $prenom, $mdp){
        $stmt = $this->db->prepare("INSERT INTO USERS VALUES ((SELECT max(id) FROM USERS)
                                                          , ?
                                                          , ?
                                                          , ?
                                                          , ?
                                                          , 0
                                                          , 0)");

        $login = substr($nom, 0, 7) . substr($prenom, 0, 1);
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $login);
        $stmt->bindParam(4, $mdp);

        $stmt->execute();
      }

      function verifConnexion($login, $mdp){
        $stmt = $this->db->prepare("SELECT mdp FROM users WHERE login = ?");
        $stmt->bindParam(1, $login);
        $stmt->execute();
        $res = $stmt->fetchAll();

        if($stmt && isset($res[0]) && $mdp == $res[0]["mdp"]){
          return true;
        } else {
          return false;
        }
      }
  }
 ?>
