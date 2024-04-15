<?php

include("../class/user.php");

class ModelUtilisateur{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db= $db;
    }

    public function getUsers(){
        try{
            $response= $this->db->prepare("SELECT * FROM user");
            $response->execute();
            $utilisateurs= array();
            while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
               $utilisateurs[]= new Utilisateur($row["id"], $row["prenom"], $row["nom"], $row["username"], $row["password"], $row["profil"]);
            }
            return $utilisateurs;
        }
        catch(PDOException $e){
            echo"Erreur lors de l'execution de la requete :". $e->getMessage();
            return array();
        }
    }

    public function getUserByPassword($pw){
        $sql=$this->db->query("SELECT password FROM user WHERE password='".$pw."' ");

        
    } 

    public function connexion($login, $pw){
        $sql= $this->db->query("SELECT profil  FROM user WHERE username='".$login."' AND password='".$pw."'");
        

        if($res=$sql->fetch()){
            if($res["profil"]=="admin"){
                 header("location:../views/pageAdministrateur.php");
            }
            else{
                  header("location:../views/boutique.php");
            }
            var_dump($res);

            //  header("location:../views/boutique.php");

            echo "Connexion établie";
        }
        else{
            echo"Login ou mot de passe incorrect";
        }
    }
    public function addUsers(Utilisateur $user){
        $sql= $this->db->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?);");
        $sql->execute(array(
            $user->getNom(),
            $user->getPrenom(),
            $user->getUsername(),
            $user->getPassword(),
            $user->getProfil(),
        ));
   
    }
}

