<?php

include("../models/modelutilisateur.php");

class UseController{
    private $model;


    public function __construct(ModelUtilisateur $model)
    {
        $this->model= $model;
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

    //Récupération des utilisateurs
    $utilisateurs= $controller->getUsers();

    //Inclusion de la vue
    include("../views/index.php");
}

catch(PDOException $e){
    //Gerer l'erreur de la connexion ici
    echo"Erreur de la connexion :" . $e->getMessage();
}