<?php

class Utilisateur{

    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $password;
    private $profil;


    public function __construct($id, $n, $pn, $u, $pw, $pf){
        $this->id=$id;
        $this->nom= $n;
        $this->prenom= $pn;
        $this->username= $u;
        $this->password= $pw;
        $this->profil= $pf;
        
    }

    public function getNom(){
        return $this->nom;
    }

     public function getPrenom(){
        return $this->prenom;
    }
    
     public function getUsername(){
        return $this->username;
    }

     public function getPassword(){
        return $this->password;
    }

      public function getProfil(){
        return $this->profil;
    }

}