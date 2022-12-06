<?php
//function ajouterArticle($bdd,$nom_article){}
 try{
    //requête préparée
    $req = $bdd->prepare('insert into article (nom_article, prix_article) values (?,?)');
    $req->bindParam(1,$nom_article,PDO::PARAM_STR);
    $req->bindParam(2,$prix_article,PDO::PARAM_INT);
    $req->execute();

    echo"<p>Votre article : $nom_article, dont le prix est : $prix_article, a bien été enregistré.</p>";

    //fermeture de la connexion à la BDD
    $req = null;
    $bdd = null;
    }catch(Exception $error){
    //affichage d'une exception en cas d’erreur
    die('Erreur : '.$error->getMessage());

    //fermeture de la connexion à la BDD
   //Comme catch ne pas connexion avec le catch
   
    $bdd = null;
}

?>