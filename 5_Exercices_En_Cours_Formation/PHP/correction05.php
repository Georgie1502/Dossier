<?php
/*Exercice 18 :
a) Créer une base de données MYSQL avec les informations suivantes :
-Nom de la bdd : « articles »,
-une table nommée article qui va posséder les champs suivants :
id_article (clé primaire),
nom_article de type varchar(50),
contenu_article de type varchar (255),
b) Créer une page php qui va contenir un formulaire html avec comme méthode POST (balise form)
-A l’intérieur du formulaire rajouter les champs suivants :
Un champ input avec comme attribut html name = «nom_article »,
Un champ input avec comme attribut html name = «contenu_article »,
Un champ input de type submit avec comme attribut html value = «Ajouter»
c) Ajouter le code php suivant :
-Créer 2 variables $name, $content
-Importer le contenu des 2 super globales $_POST[‘nom_article’], $_POST[‘contenu_article’] et tester les avec la
méthode isset() dans les variables créés précédemment ($name et $content),
-Ajouter le code de connexion à la base de données en vous inspirant des exemples vus dans ce chapitre,
-Ajouter une requête simple qui va insérer le contenu des 2 champs dans un nouvel enregistrement (requête SQL
insert),
d) Bonus :
-Utiliser une requête SQL préparée à la place de la requête simple.
-Afficher dans un paragraphe le nom et le contenu de l’article ajouté en bdd en dessous du formulaire.*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom_article" placeholder="entrez le nom de l'article">
        <!--<input type="text" name="contenu_article" placeholder="entrez le contenu de l'article">-->
        <textarea name="contenu_article"></textarea>
        <input type="submit" value="Ajouter l'article">
    </form>

    <?php
        if(isset($_POST['nom_article']) and $_POST['nom_article'] !=''
        and isset($_POST['contenu_article']) and $_POST['contenu_article'] !=''){
            $nom_article = $_POST['nom_article'];
            $contenu_article = $_POST['contenu_article'];

            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=articles','root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            try{
                //$req = $bdd->query('insert into article (nom_article, contenu_article) values ("'.$nom_article.'","'.$contenu_article.'")');


                //requête préparée
                $req = $bdd->prepare('insert into article (nom_article, contenu_article) values (?,?)');
                $req->bindParam(1,$nom_article,PDO::PARAM_STR);
                $req->bindParam(2,$contenu_article,PDO::PARAM_STR);
                $req->execute();

                echo"<p>Votre article : $nom_article, dont le contenu est : $contenu_article, a bien été enregistré.</p>";


            }catch(Exception $error){
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$error->getMessage());
            }
        }
    ?>
</body>
</html>