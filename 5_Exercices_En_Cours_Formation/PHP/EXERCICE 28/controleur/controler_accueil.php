<?php


include('vue_connect.php');
include('model_utilisateur.php');
include('vue_connexion.php');
//scrip pour se connecter 
/*Les etapes*/



if(isset($_POST['login_utilisateur']) and $_POST['login_utilisateur']!=""
and isset($_POST['mdp_utilisateur']) and $_POST['mdp_utilisateur']!=""){
    //Recupere les donnes de post
    $login_utilisateur = $_POST['login_utilisateur'];
    $mdp_utilisateur = $_POST['mdp_utilisateur'];

    //Créer l'utilisateur à enregister (le mole à gatau)
    
    $user = new Utilisateur('',$login_utilisateur, $mdp_utilisateur);
   
    //on demande à l'utilisateur de s'enregistrer
    $message = $user->insertUser($bdd);
    
    //afficher le message de insertUser
   

include('vue_compte.php');

include('vue_utilisateur.php');

}

?>