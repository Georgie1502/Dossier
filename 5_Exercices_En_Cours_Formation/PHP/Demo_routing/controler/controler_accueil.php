<?php
    session_start();
    include('utils/connect.php');

    include('model/model_utilisateur.php');

    include('vue/header.php');
    include('vue/vue_utilisateur.php');

    //Script d'inscription d'un utilisateur
    //Vérifier les champs de mon formulaire
    if(isset($_POST['login_utilisateur']) and $_POST['login_utilisateur'] != ""
    and isset($_POST['mdp_utilisateur']) and $_POST['mdp_utilisateur'] != ""){
        //Récupère les données de POST
        $login_utilisateur = $_POST['login_utilisateur'];
        $mdp_utilisateur = $_POST['mdp_utilisateur'];

        //Créer l'utilisateur à enregister
        $user = new Utilisateur("",$login_utilisateur,$mdp_utilisateur);

        //On demande à l'utilisateur de s'enregister
        $message = $user->ajoutUtilisateur($bdd);

        //Afficher le message de ajoutUtilisateur()
        echo $message;
    }

    include('vue/vue_connexion.php');

    //Script pour se connecter
    /*Les ETAPES :
    1)Vérifier les champs entrés par l'utilisateur (Si c'est pas NULL, ni Vide) -> c'est le if
    2)Récupérer les informations de connexion dans des variables depuis POST
    3)Créer l'utilisateur qui veut se connecter avec new Utilisateur()
    4)Chercher en BDD grâce à la requête Select, les infos de l'utilisateur, grâce au Login entré par l'utilisateur -> c'est une méthode du model Utilisateur
    5)Je stocke la réponse de la BDD dans une variable $data -> c'est un tableau qui contient plusieurs tableau utilisateur
    6)On vérifie les informations de $data (Si l'utilisateur existe, et si le mot de passe correspond)
    7)Si tout est OK, on crée les variable de SESSION : $_SESSION['id_utilisateur'], $_SESSION['login_utilisateur'], et $_SESSION['connexion'] (celle-ci sera vide)*/

    //ETAPE 1 : Vérification des champs
    if(isset($_POST['login_utilisateur_connexion']) and $_POST['login_utilisateur_connexion'] != ""
    and isset($_POST['mdp_utilisateur_connexion']) and $_POST['mdp_utilisateur_connexion'] != ""){
        //ETAPE 2 : récupération des variables depuis POST
        $login_utilisateur_connexion = $_POST['login_utilisateur_connexion'];
        $mdp_utilisateur_connexion = $_POST['mdp_utilisateur_connexion'];

        //ETAPE 3 : création de l'utilisateur qui veut se connecter
        $user_connect = new Utilisateur("",$login_utilisateur_connexion,$mdp_utilisateur_connexion);

        //ETAPE 4 et 5 : Chercher en BDD les infos de l'utilisateur, et stocker la réponse dans $data
        $data = $user_connect -> selectUtilisateurFromLogin($bdd);

        //ETAPE 6 : Vérifier les infos de $data
        if(!empty($data)){
            foreach($data as $row){
                if($row['mdp_utilisateur'] == $mdp_utilisateur_connexion){
                    //ETAPE 7 : tout s'est bien passé, donc on connecte l'utilsateur, en créant les variable SESSION
                    $_SESSION['login_utilisateur'] = $row['login_utilisateur'];
                    $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
                    $_SESSION['connexion']="";

                    echo $_SESSION['login_utilisateur'].' est bien connecté.';
                }
                else {
                    echo 'Mauvais mot de passe';
                }
            }
        }else{
            echo'Aucun utilisateur trouvé.';
        }


    }

    include('vue/footer.php');
?>