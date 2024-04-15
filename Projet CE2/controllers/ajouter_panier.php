<?php

include_once("../connexion/db_connection.php");

if(!isset($_SESSION)){
    session_start();
}


if(!isset($_SESSION["panier"])){
    $_SESSION["panier"]= array();
}

if(isset($_GET["id"])){
    $id= $_GET["id"];

    $reponse= $dbco->prepare("SELECT* FROM produit WHERE id = $id");
    $reponse->execute();
    if(empty($reponse->fetch(PDO::FETCH_ASSOC))){
        die("Ce produit n'Existe pas");
    }

    if(isset($_SESSION["panier"][$id])){
        $_SESSION["panier"][$id]++;
    }
    else{
        $_SESSION["panier"][$id]= 1;
    }

    header("location:../views/boutique.php");

    
}