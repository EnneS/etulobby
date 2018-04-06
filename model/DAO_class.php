<?php
  $dao = new DAO();
  require_once("../model/user_class.php");
  require_once("../model/module_class.php");
  class DAO {
      // L'objet local PDO de la base de donnée
      private $db;
      // Le type, le chemin et le nom de la base de donnée
      private $database = 'sqlite:../model/db/etulobby.db';

      // Constructeur chargé d'ouvrir la BD
      function __construct() {

          $this->db = new PDO($this->database);
      }


      function newLogin($nom, $prenom){
        // On veut créer un nouveau login qui n'existe pas déjà dans la base de donnée.
        // Pour ça, on récupère tout les logins existant et on vérifie si celui qu'on veut créé n'existe pas déjà
        // Tant que ce n'est pas le cas, on modifie le login
        $login = strtolower(substr($nom, 0, 7) . substr($prenom, 0, 1));

        $stmt = $this->db->prepare("SELECT login FROM users");
        $stmt->execute();
        $res = $stmt->fetchAll();
        $i = 1;

        $loginTab = array();
        foreach ($res as $logintemp) {
          array_push($loginTab, $logintemp[0]);
        }

        while(in_array($login, $loginTab)){
          $login = strtolower(substr($nom, 0,7-$i) . substr($prenom, 0, 1+$i));
        $i++;
        }
        return $login;
      }

      function inscrireUser($nom, $prenom, $mdp, $login){
        $stmt = $this->db->prepare("INSERT INTO USERS VALUES ((SELECT max(id)+1 FROM users)
									, ?
									, ?
									, ?
									, ?
									, 1
									, 0)");

        $nom = ucfirst($nom);
        $prenom = ucfirst($prenom);

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

      function getUserId($login) {
	       $stmt = $this->db->prepare("SELECT id FROM users WHERE login = ?");
         $stmt->bindParam(1, $login);
         $stmt->execute();
         $res = $stmt->fetchAll();
         return $res[0]["id"];
      }

      function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_CLASS, "User");
        return $user[0];
      }

     function getModulesBySemestre($id){
       $req = "SELECT * FROM module WHERE numSemestre = ?";
       $stmt = $this->db->prepare($req);
      $stmt->bindParam(1,$id);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Module");

      foreach ($result as $module) {
        $module->enseignants = $this->getIdEnseignantByModule($module->id);
      }

      return $result;
      }

      function getIdEnseignantByModule($id) {
      $req = "SELECT idUser FROM enseigne WHERE idModule = ?";
      $stmt = $this->db->prepare($req);
      $stmt->bindParam(1,$id);
      $stmt->execute();
      $result = $stmt->fetchAll();

      $enseignants = array();
      foreach($result as $tab){
          array_push($enseignants, $this->getUserById($tab["idUser"]));
      }

      return $enseignants;
      }

  }
 ?>
