<?php

include("../models/modelutilisateur.php");

class UseController{
    private $model;


    public function __construct(ModelUtilisateur $model)
    {
        $this->model= $model;
    }

    public function connexion($login, $pw){
        return $this->model->connexion($login, $pw);
    }

     public function getUsers(){
        return $this->model->getUsers();
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
    include("../views/connexion.php");
    var_dump($_POST);
        extract($_POST);
        $username=$_POST["username"];

        $pass=$_POST["password"];
        

    //Récupération des utilisateurs
    $utilisateurs= $controller->connexion($username, $pass);
    var_dump($utilisateurs);
   // header("location:../views/boutique.php");
    //Inclusion de la vue
    
}

catch(PDOException $e){
    //Gerer l'erreur de la connexion ici
    echo"Erreur de la connexion :" . $e->getMessage();
}