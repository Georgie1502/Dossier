<!--
    MON FICHIER MODEL de mon architecture Model-Vue-Controler
    -> Contient TOUT ce qui concerne mes requêtes à la BDD
-->

<?php
 try{
    //requête préparée
    $req = $bdd->prepare('insert into article (nom_article, contenu_article) values (?,?)');
    $req->bindParam(1,$nom_article,PDO::PARAM_STR);
    $req->bindParam(2,$contenu_article,PDO::PARAM_STR);
    $req->execute();

    echo"<p>Votre article : $nom_article, dont le contenu est : $contenu_article, a bien été enregistré.</p>";

    //fermeture de la connexion à la BDD
    $req = null;
    $bdd = null;
}catch(Exception $error){
    //affichage d'une exception en cas d’erreur
    die('Erreur : '.$error->getMessage());

    //fermeture de la connexion à la BDD
    $req = null;
    $bdd = null;
}
?>