<?php
function ajouter_user($bdd,$login_user,$mdp_user,$url_img){
        try{
        //Requête préparé
        $req = $bdd->prepare('insert into users (login_user, mdp_user) values (?,?)');

        //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
        $req->bindParam(1,$login_user,PDO::PARAM_STR);
        $req->bindParam(2,$mdp_user,PDO::PARAM_STR);

        //Exécution de la requête
        $req->execute();

        //Message de validation
        echo"<p>L'utilisateur a bien été enregistré.</p>";

        //Nouvelle requête pour récupérer l'id_user enregistré
        $req = $bdd->prepare('select id_user from users where login_user = ?');
        //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
        $req->bindParam(1,$login_user,PDO::PARAM_STR);
        //Exécution de la requête
        $req->execute();

        //stocke la réponse de la BDD
        $data = $req->fetchAll();

        //j'extrait la donnée que je veux, depuis mon tableau de tableaux associatifs $data
        $id_user;
        foreach($data as $row){
            $id_user = $row['id_user'];
        }

        //Nouvelle requête pour enregistrer l'image
        $req = $bdd->prepare('insert into image (url_img, id_user) values (?,?)');

        //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
        $req->bindParam(1,$url_img,PDO::PARAM_STR);
        $req->bindParam(2,$id_user,PDO::PARAM_INT);

        //Exécution de la requête
        $req->execute();

        //Affiche message de confirmation
        echo"<p>L'image a bien été enregistré.</p>";

        //fermeture de la connexion
        $req=null;
        $bdd=null;

    }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());

        //fermeture de la connexion
        $req=null;
        $bdd=null;
    }
}

function afficher_user($bdd){
    try{
        //Préparation de la requête Select
        $req = $bdd->prepare('select * from image inner join users on image.id_user = users.id_user;');
        //Exécution de la requête
        $req->execute();

        //Récupération de la réponse de la BDD
        $data = $req->fetchAll(); /*-> data est un tableau contenant des tableaux associatifs*/

        //fermeture de la connexion
        $req=null;
        $bdd=null;
        
        //2) J'affiche mes users avec leur image
        foreach($data as $row){
            echo"<h3>Login : ".$row['login_user']."</h3>
            <img src='".$row['url_img']."'>";
        }
    }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());

        //fermeture de la connexion
        $req=null;
        $bdd=null;
    }
}
?>