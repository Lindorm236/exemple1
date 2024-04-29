<?php

include_once("../connexion/db_connection.php");
include("../models/modelutilisateur.php");
include("../class/user.php");

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

    public function getUserByUsername($username){
        return $this->model->getUserByUsername($username);
    }

    public function updateUser($username){
        return $this->model->updateUser($username);
    }

}
$servername= "localhost";
$dbname= "projetce2";
$user="root";
$pass="";

try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $model= new ModelUtilisateur($dbco);
    $controller= new UseController($model);
    include("../views/recuPasse.php");
    var_dump($_POST);
        extract($_POST);
        $username=$_POST["username"];

        echo($username);
  $utilisateurs = $controller->getUserByUsername($username);
        ?>
            <input type="text">
        <?php


// if ($utilisateurs && isset($utilisateurs["username"]) && $utilisateurs["username"] == $username) {
//     echo "oui";
// }
   
}

catch(PDOException $e){
    //Gerer l'erreur de la connexion ici
    echo"Erreur de la connexion :" . $e->getMessage();
}