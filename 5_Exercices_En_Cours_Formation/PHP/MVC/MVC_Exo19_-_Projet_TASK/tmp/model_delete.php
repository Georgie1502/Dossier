<?php 
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
?>