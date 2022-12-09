<?php
session_start();
include('../utils/connect.php');
include('../model/model_user.php');
include('../header.php');
include('../vue/vue_user.php');
//INSCRIPTION USER
if(isset($_POST['name_users']) and $_POST['name_users']!=""
    and isset($_POST['first_name_users']) and $_POST['first_name_users']!=""
    and isset($_POST['login_users']) and $_POST['login_users']!=""
    and isset($_POST['mdp_users']) and $_POST['mdp_users']!=""){
        //recuperation des donnees à enregister en bdd
        $name_users = $_POST['name_users'];
        $first_name_users = $_POST['first_name_users'];
        $login_users = $_POST['login_users'];
        $mdp_users = $_POST['mdp_users'];

        $user = new User('', $name_users, $first_name_users, $login_users, $mdp_users);
        //var_dump($user);

        $message = $user->insertUser($bdd);
        echo $message;
    }
    include('../vue/vue_connexion.php');

    //Script pour se connecter

     //ETAPE 1 : Vérification des champs
     if(isset($_POST['login_utilisateur_connexion']) and $_POST['login_utilisateur_connexion'] != ""
     and isset($_POST['mdp_utilisateur_connexion']) and $_POST['mdp_utilisateur_connexion'] != ""){
         //ETAPE 2 : récupération des variables depuis POST
         $login_utilisateur_connexion = $_POST['login_utilisateur_connexion'];
         $mdp_utilisateur_connexion = $_POST['mdp_utilisateur_connexion'];
 
         //ETAPE 3 : création de l'utilisateur qui veut se connecter
         $user_connect = new User("","","",$login_utilisateur_connexion,$mdp_utilisateur_connexion);
         //comme on a 5 valeur dans le constructeur il faut mettre dans me nouvaeu objet les memes numbre de valeur y
          //if faut les mettre dans le meme position. 
 
         //ETAPE 4 et 5 : Chercher en BDD les infos de l'utilisateur, et stocker la réponse dans $data , de la partie 
         //de notre methode 
         $data = $user_connect -> selectUtilisateurFromLogin($bdd);
 
         //ETAPE 6 : Vérifier les infos de $data si elle est vide ou 
         if(!empty($data)){
             foreach($data as $row){
                 if($row['mdp_users'] == $mdp_utilisateur_connexion){
                     //ETAPE 7 : tout s'est bien passé, donc on connecte l'utilsateur, en créant les variable SESSION
                     $_SESSION['login_users'] = $row['login_users'];
                     $_SESSION['id_users'] = $row['id_users'];
                     $_SESSION['connexion']="";
 
                     echo $_SESSION['login_users'].' est bien connecté.';
                 }
                 else {
                     echo 'Mauvais mot de passe';
                 }
             }
         }else{
             echo'Aucun utilisateur trouvé.';
         }
 
 
     }
     
     include('../footer.php');
?>