<?php
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
?>