<?php
/*
MON FICHIER MODEL de mon architecture Model-Vue-Controler
-> Contient TOUT ce qui concerne mes requêtes à la BDD
*/
function insertUser($bdd,$name_users,$first_name_users,$login_users,$mdp_users){
    try{
        $req = $bdd->prepare('insert into users (name_users, first_name_users, login_users, mdp_users) values(?,?,?,?)');
        $req->bindParam(1,$name_users,PDO::PARAM_STR);
        $req->bindParam(2,$first_name_users,PDO::PARAM_STR);
        $req->bindParam(3,$login_users,PDO::PARAM_STR);
        $req->bindParam(4,$mdp_users,PDO::PARAM_STR);
        $req->execute();
        echo"<p>L'Utilisateur $name_users $first_name_users a bien été enregistré. Login : $login_users</p>";
    }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());
    }
}

function affichageUser($bdd){
    try{
        $req = $bdd->prepare('select * from users');
        $req->execute();
    
       $data=$req->fetchAll();
    
       foreach($data as $row){
           echo"<p>Utilisateur : ".$row['name_users']." ".$row['first_name_users']." - Login : ".$row['login_users']." </p>";
       }
    
    
    }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());
    }
}


function listDelete($bdd){
    try{
        $req = $bdd->prepare('select * from users');
        $req->execute();
        $data=$req->fetchAll();
        foreach($data as $row){
            echo"<li>Utilisateur : ".$row['name_users']." ".$row['first_name_users']." - Login : ".$row['login_users']."<input type='checkbox' name='box[]' value='".$row['id_users']."'> </li>";
        }
    }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());
    }
}


function deleteUser($bdd,$tabUsers){
    try{

        foreach($tabUsers as $user){
            $req = $bdd->prepare('delete from users where id_users in (?)');
            $req->bindParam(1,$user,PDO::PARAM_INT);
            $req->execute();
        }
        
        echo"<p>Utilisateur supprimé</p>";
        
        
        }catch(Exception $error){
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$error->getMessage());
        }
}
?>
