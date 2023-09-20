<?php
//Création d'un tableau contenant les informations d'une équipe
/*Commandes Utilisées :
git add . : pour sauvegarder
git clone : pour le clonage 
git commit -m "init"

Ce fichier a été enregistré dans le document exemple1
*/
$team_1_data=["LesCanadiens", 3];
echo $team_1_data[0];

$team_1_data=[
    "name"=>"Les Canadiens",
    "score"=>3,
    "url"=>"www;canadiens.ca"
];
$team_2_data=[
    "name"=>"Les Canadiens",
    "score"=>3,
    "url"=>"www.togo.com"
];
echo $team_2_data("url");
?>