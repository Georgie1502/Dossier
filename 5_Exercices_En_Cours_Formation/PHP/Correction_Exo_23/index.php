<?php
//import du fichier de connexion
include('./utils/connect.php');
//import du model
include('./model/model_user.php');
//import de la vue
include('./vue/vue_user.php');

    //Traitement du formulaire d'inscription
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

            if($ext == "jpg" or $ext == "png" or $ext == "gif"){
                //déplacement de mon image vers le dossier que je souhaite
                $moveFile = move_uploaded_file($tmp_name,"img/$name"); /*->Je dois m'assurer que le dossier 'img' existe bien*/
                $url_img = "img/$name";

                //Ajout du user et de son image en BDD
                ajouter_user($bdd,$login_user,$mdp_user,$url_img);

            } else {
                echo'<p>ERROR : format de fichier non valide. Veuillez utiliser du JPG, PNG ou GIF.</p>';
            }
    } else {
        echo'<p>ERROR : Formulaire mal complété.</p>';
    }

    //Affichage des users et de leur image
    afficher_user($bdd);

?>