<?php
  $dao = new DAO();
  require_once("../model/user_class.php");
  require_once("../model/module_class.php");
  require_once("../model/cours_class.php");
  require_once("../model/message_class.php");
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
        $module->cours = $this -> getIdCoursByModule($module->id);
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

      function getIdCoursByModule($id) {
          $req = "SELECT * FROM cours WHERE numModule = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$id);
          $stmt->execute();
          $cours = $stmt->fetchAll(PDO::FETCH_CLASS,"Cours");
          return $cours;
      }

      function searchCours($idUser, $idCours){
          $req = "SELECT * FROM revision WHERE idUser = ? AND idCours = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$idUser);
          $stmt->bindParam(2,$idCours);
          $stmt->execute();
          $res = $stmt->fetchAll();
          if (empty($res)) {
              return false;
          }
          return true;
      }

      function addCours($idUser, $idCours) {
          $req = "INSERT INTO revision (idUser, idCours) VALUES (:idUser, :idCours)";
          $stmt = $this->db->prepare($req);
          //var_dump($stmt);
          $stmt -> BindParam(':idUser',$idUser);
          $stmt -> BindParam(':idCours',$idCours);
          $stmt -> execute();
      }

      function delCours($idUser, $idCours) {
          $req = "DELETE FROM revision WHERE idUser=:idUser AND idCours=:idCours";
          $stmt = $this->db->prepare($req);
          $stmt -> execute(array(':idUser'=>$idUser, ':idCours'=>$idCours));
          $stmt -> execute();
      }

      function getCoursRevisionByIdUser($idUser) {
          $req = "SELECT idCours FROM revision WHERE idUser = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$idUser);
          $stmt->execute();
          $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $coursRevision = array();
          foreach ($res as $idCours){
              array_push($coursRevision,$this->getCoursById($idCours["idCours"]));
          }
          return $coursRevision;
      }

      function getCoursById($idCours) {
          $req = "SELECT * FROM cours WHERE id = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$idCours);
          $stmt->execute();
          $cours = $stmt->fetchAll(PDO::FETCH_CLASS,"Cours");
          return $cours[0];
      }

      function getModulesByEnseignant($idUser) {
          $req = "SELECT idModule FROM enseigne WHERE idUser = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$idUser);
          $stmt->execute();
          $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

          return $res;
      }

      function getModuleById($id) {
          $req = "SELECT * FROM module WHERE id = ?";
          $stmt = $this->db->prepare($req);
          $stmt->bindParam(1,$id);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Module");
          return $result;

      }

      function addMessage($titre, $message){
        $stmt = $this->db->prepare("INSERT INTO message VALUES ((SELECT max(id) + 1 FROM message), ?, ?)");
        $stmt->bindParam(1,$titre);
        $stmt->bindParam(2,$message);
        $stmt->execute();
      }

      function getAllMessage(){
        $stmt = $this->db->prepare("SELECT * FROM message");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_CLASS,"Message");
        return $messages;
      }

  }
 ?>
