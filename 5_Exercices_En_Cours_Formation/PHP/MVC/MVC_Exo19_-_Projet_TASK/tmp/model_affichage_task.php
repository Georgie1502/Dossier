<?php
/*
MON FICHIER MODEL de mon architecture Model-Vue-Controler
-> Contient TOUT ce qui concerne mes requêtes à la BDD
*/
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

?>