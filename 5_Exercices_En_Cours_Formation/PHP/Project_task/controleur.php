<?php

//ajout de la vue
include('vue.php');



//Verification 
if(isset($_POST['name_user']) and $_POST['name_user'] != ""
and isset($_POST['first_name_user']) and $_POST['first_name_user'] != "" and
isset($_POST['login_user']) and $_POST['login_user'] != ""
and isset($_POST['mdp_user']) and $_POST['mdp_user'] != ""){

    //Recuperation des valeurs
    $name_user = $_POST['name_user'];
    $first_name_user = $_POST['first_name_user'];
    $login_user= $_POST['login_user'];
    $mdp_user=$_POST['mdp_user'];

    //ajout du model qui va faire la requête d'enregistrement
    include('model.php');
    //connexion à la BDD
    include('connect.php');

    
}
include('connect.php');
include('model.php');



?>