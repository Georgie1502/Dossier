<?php

//ajout de la vue
include('vue_21.php');

//connexion à la BDD
include('connect_21.php');

if(isset($_POST['login_user']) and $_POST['login_user']!=""
and isset($_POST['mdp_user']) and $_POST['mdp_user']!=""
and isset($_FILES['file'])){
    //récupération des infos de mon user
    $login_user = $_POST['login_user'];
    $mdp_user = $_POST['mdp_user'];

    //récupération des infos de mon fichier
    //var_dump($_FILES['file']);
    $tmp_name = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];

    //récupération de l'extension du fichier
    $fichier = new SplFileInfo($name);
    $ext = $fichier->getExtension();

    //ajout du model qui va faire la requête d'enregistrement
     include('model_21.php.');
    } else {
        echo'<p>ERROR : format de fichier non valide. Veuillez utiliser du JPG, PNG ou GIF.</p>';
    }


