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

      // ======================================================
      // == Fonctions relatives à la connexion / inscription ==
      // ======================================================

      // On veut créer un nouveau login qui n'existe pas déjà dans la base de donnée.
      // Pour ça, on récupère tout les logins existant et on vérifie si celui qu'on veut créé n'existe pas déjà
      // Tant que ce n'est pas le cas, on modifie le login (selon la création de login de Chamilo)
      function newLogin($nom, $prenom){

        // Login = 7 premières lettres du nom + la première du prénom
        $login = strtolower(substr($nom, 0, 7) . substr($prenom, 0, 1));

        $stmt = $this->db->prepare("SELECT login FROM users");
        $stmt->execute();
        $res = $stmt->fetchAll();

        // On récupère les logins dans un array (et non array d'array comme le fait fetchAll().......)
        $loginTab = array();
        foreach ($res as $logintemp) {
          array_push($loginTab, $logintemp[0]);
        }

        // Tant que le $login et dans l'array $loginTab on enlève $i caractère du nom et ajoute $i du prénom au login.
        $i = 1;
        while(in_array($login, $loginTab)){
          $login = strtolower(substr($nom, 0,7-$i) . substr($prenom, 0, 1+$i));
          $i++;
        }

        // Notre login est désormais unique
        return $login;
      }

      // Etant donné un nom, prenom, mdp et login donné on inscrit l'user dans la BD
      function inscrireUser($nom, $prenom, $mdp, $login){
        $stmt = $this->db->prepare("INSERT INTO USERS VALUES ((SELECT max(id)+1 FROM users)
									, ?
									, ?
									, ?
									, ?
									, 1
									, 0)");

        // Uppercase au premier carac de $nom et $prenom
        $nom = ucfirst($nom);
        $prenom = ucfirst($prenom);
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $login);
        $stmt->bindParam(4, $mdp);

	      $stmt->execute();
      }

      // Etant donné un login et un mdp donné, on vérifie que les deux existent/concordent
      function verifConnexion($login, $mdp){
        $stmt = $this->db->prepare("SELECT mdp FROM users WHERE login = ?");
        $stmt->bindParam(1, $login);
        $stmt->execute();
        $res = $stmt->fetchAll();

        if($stmt && isset($res[0]) && password_verify($mdp, $res[0]["mdp"])){
          return true;
        } else {
          return false;
        }
      }

      // ======================================================
      // === Fonctions relatives aux infos de l'utilisateur ===
      // ======================================================

      // Etant donné un login, on récupère l'id de l'utilisateur
      function getUserId($login) {
	      $stmt = $this->db->prepare("SELECT id FROM users WHERE login = ?");
        $stmt->bindParam(1, $login);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res[0]["id"];
      }

      // Etant donné un id, on récupère un objet User
      function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_CLASS, "User");
        return $user[0];
      }

      function getEleves(){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE rang = 0");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_CLASS, "User");
        return $users;
      }

      function setSemestre($id, $numSemestre){
        $stmt = $this->db->prepare("UPDATE users SET numSemestre = ? WHERE id = ?");
        $stmt->bindParam(1, $numSemestre);
        $stmt->bindParam(2, $id);
        $stmt->execute();
      }

      // ======================================================
      // == Fonctions relatives aux infos d'un module/cours ===
      // ======================================================

      // Etant donné un id de module, on récupère l'objet Module correspondant.
      function getModuleById($id) {
        $req = "SELECT * FROM module WHERE id = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Module");
        return $result;
      }

      // Etant donné un numéro de semestre, on récupère tout les modules en faisant parti
      // Avec les enseignants et les cours relatifs à ce module
     function getModulesBySemestre($id){
       $req = "SELECT * FROM module WHERE numSemestre = ?";
       $stmt = $this->db->prepare($req);
       $stmt->bindParam(1,$id);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Module");

       // Pour chaque module trouvé on ajoute les enseignants et les cours de ce module
      foreach ($result as $module) {
        $module->enseignants = $this->getIdEnseignantByModule($module->id);
        $module->cours = $this -> getIdCoursByModule($module->id);
      }

      return $result;
      }

      // Etant donné un id de module, on récupère la liste des enseignants (objet user)
      function getIdEnseignantByModule($id) {
        $req = "SELECT idUser FROM enseigne WHERE idModule = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Pour chaque id d'user de la table enseigne trouvé on récupère l'objet user.
        $enseignants = array();
        foreach($result as $tab){
          array_push($enseignants, $this->getUserById($tab["idUser"]));
        }

        return $enseignants;
      }

      // Etant donné un id d'enseignant, on récupère tout les modules qu'il enseigne.
      function getModulesByEnseignant($idUser) {
        $req = "SELECT idModule FROM enseigne WHERE idUser = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$idUser);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
      }

      // Etant donné un id de cours, on récupère l'objet Cours correspondant
      function getCoursById($idCours) {
        $req = "SELECT * FROM cours WHERE id = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$idCours);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_CLASS,"Cours");
        return $cours[0];
      }

      // Etant donné un id de module, on récupère tout les objets Cours faisant parti du module.
      function getIdCoursByModule($id) {
        $req = "SELECT * FROM cours WHERE numModule = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_CLASS,"Cours");
        return $cours;
      }

      // ======================================================
      // ===== Fonctions relatives à la liste de révision =====
      // ======================================================

      // Etant donné un id d'utilisateur et un id de cours, on vérifie que l'user ne révise pas déjà ce cours
      function searchCours($idUser, $idCours){
        $req = "SELECT * FROM revision WHERE idUser = ? AND idCours = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$idUser);
        $stmt->bindParam(2,$idCours);
        $stmt->execute();
        $res = $stmt->fetchAll();

        // Si le résultat est vide, ce cours n'est pas révisé par l'utilisateur
        if (empty($res)) {
          return false;
        } else { // Et inversement
          return true;
        }
      }

      // Etant donné un id d'user et un id de cours, on ajoute ce cours à la liste de révision de l'user
      function addCours($idUser, $idCours) {
        $req = "INSERT INTO revision (idUser, idCours) VALUES (:idUser, :idCours)";
        $stmt = $this->db->prepare($req);
        $stmt -> BindParam(':idUser',$idUser);
        $stmt -> BindParam(':idCours',$idCours);
        $stmt -> execute();
      }

      // Etant donné un id d'user et un id de cours on supprime ce cours de la liste de révision de l'user
      function delCours($idUser, $idCours) {
        $req = "DELETE FROM revision WHERE idUser=:idUser AND idCours=:idCours";
        $stmt = $this->db->prepare($req);
        $stmt -> execute(array(':idUser'=>$idUser, ':idCours'=>$idCours));
        $stmt -> execute();
      }

      // Etant donné un id d'user, on récupère tout les cours qu'il révise
      function getCoursRevisionByIdUser($idUser) {
        $req = "SELECT idCours FROM revision WHERE idUser = ?";
        $stmt = $this->db->prepare($req);
        $stmt->bindParam(1,$idUser);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Pour chaque id de cours de la table revision trouvé, on récupère son objet cours.
        $coursRevision = array();
        foreach ($res as $idCours){
          array_push($coursRevision,$this->getCoursById($idCours["idCours"]));
        }

        return $coursRevision;
      }

      // ======================================================
      // ===== Fonctions relatives aux messages des profs =====
      // ======================================================

      // Etant donné un titre et un message, on créé un message
      function addMessage($titre, $message){
        $stmt = $this->db->prepare("INSERT INTO message VALUES ((SELECT max(id) + 1 FROM message), ?, ?)");
        $stmt->bindParam(1,$titre);
        $stmt->bindParam(2,$message);
        $stmt->execute();
      }

      // Etant donné un id de message, on supprime le message
      function delMessage($id){
        $stmt = $this->db->prepare("DELETE FROM message WHERE id = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
      }

      // On récupère tout les messages existants par ordre décroissant d'id (les plus jeunes en premier)
      function getAllMessage(){
        $stmt = $this->db->prepare("SELECT * FROM message ORDER BY id desc");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_CLASS,"Message");
        return $messages;
      }

  }
 ?>
