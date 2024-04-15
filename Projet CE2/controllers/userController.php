<?php

include("../models/modelutilisateur.php");

class UseController{
    private $model;


    public function __construct(ModelUtilisateur $model)
    {
        $this->model= $model;
    }

    // public function connexion($login, $pw){
    //     return $this->model->connexion($login, $pw);
    // }

    public function addUsers(Utilisateur $user){
        return $this->model->addUsers($user);
    }
}

$servername= "localhost";
$dbname= "projetce2";
$user="root";
$pass="";

try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Instanciation du modèle et du contrôleur
    $model= new ModelUtilisateur($dbco);
    $controller= new UseController($model);
    include("../views/index.php");
    // var_dump($_POST);
    //     extract($_POST);
    $nom= $_POST["nom"];
    $prenom=$_POST["prenom"];
         $username=$_POST["username"];

        $pass=$_POST["Userpassword"];
        $profil = $_POST["profil"];
       
$user=new Utilisateur(0, $nom, $prenom, $username, $pass, $profil);
       // var_dump($user);


        

    //Récupération des utilisateurs
    $utilisateurs= $controller->addUsers($user);
     header("location:../views/connexion.php");
        

        

    //Inclusion de la vue
    
}

catch(PDOException $e){
    //Gerer l'erreur de la connexion ici
    echo"Erreur de la connexion :" . $e->getMessage();
}