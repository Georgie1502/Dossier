<!-- 
Exercice 18 :
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
-Afficher dans un paragraphe le nom et le contenu de l’article ajouté en bdd en dessous du formulaire.
*/ -->

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
        <input type="text" name="nom_article" >
        <input type="text" name="contenu_article">
        <input type="submit" value = "Ajouter">
    
    </form>
</body>
</html>

<?php
        if(isset($_POST['nom_article']) and $_POST['nom_article'] != ""
        and isset($_POST['contenu_article']) and $_POST['contenu_article'] != ""){
            $name = $_POST['nom_article'];
            $content = $_POST['contenu_article'];

        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=articles','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        try{

            //Version la plus sécurisé avec du Binding Parameter
            $req = $bdd->prepare("insert into article (nom_article, contenu_article) values (?,?)");
                
            $req->bindParam(2,$name,PDO::PARAM_STR);
            $req->bindParam(1,$content,PDO::PARAM_STR);
          
            $req->execute();
            echo"<p>Article enregistré en BDD</p>";

            
        }catch(Exception $error){
            var_dump("<p>".$error."</p>");
        }    
        
    }
        try{
        $req = $bdd->prepare("select nom_article, contenu_article from article ");
                
            $req->execute();
            echo"<p>Mes articles</p>";

            //on recuper la reponde de la bdd:
            $data = $req->fetchAll();
                foreach($data as $row){
                    echo "<li>Nom_article :".$row["nom_article"]."  - Contenu: ".$row["contenu_article"]."</li>";
                }

            
            }catch(Exception $error){
            var_dump("<p>".$error."</p>");
        }
        $bdd=null;
        $req=null;
?>

<!-- 
Exercice 19-  PROJET TASK Partie 1 
a) Créer une base de données MYSQL depuis le MLD ci-dessous :
-Nom de la BDD : «task»,
b) Créer une page php qui va contenir un formulaire html avec comme méthode POST (balise form) cette page va
nous permettre de créer nos comptes utilisateurs et les sauvegarder dans la base de données.
-A l’intérieur du formulaire ajouter les champs suivants :
Un champ input avec comme attribut html name = «name_user»,
Un champ input avec comme attribut html name = «first_name_user»,
Un champ input avec comme attribut html name = «login_user»,
Un champ input avec comme attribut html name = «mdp_user»,
Un champ input de type submit avec comme attribut html value = « Ajouter »
c) Ajouter le code php suivant :
-Créer 4 variables $name_user, $first_name_user, $login_user, $mdp_user,
-Importer le contenu des super globales $_POST[‘name_user’], $_POST[‘first_name_user’], $_POST[‘login_user’],
$_POST[‘mdp_user’], et tester les avec la méthode isset() (dans la condition if) dans les variables créées
précédemment ($name_user, $first_name_user, $login_user, $mdp_user),
-Ajouter le code de connexion à la base de données en vous inspirant des exemples vus dans ce chapitre,
-Ajouter une requête simple qui va insérer le contenu des 4 champs dans un nouvel enregistrement (requête SQL
insert),
-Afficher après l’insertion en base de données les informations que vous avez saisies (nom, prenom, login, mot de
passe).
d)Bonus :
-Afficher en bas de la page la liste des comptes utilisateurs créés avec une requête SQL select,
-Utiliser une requête SQL préparée.
MLD du projet
 -->

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
        <input type="text" name="name_user" >
        <input type="text" name="first_name_user" >
        <input type="text" name="login_user" >
        <input type="text" name="mdp_user" >
        <input type="submit" value="Ajouter">
    </form>
    
    <?php
        if(isset($_POST['name_user']) and $_POST['name_user'] != ""
        and isset($_POST['first_name_user']) and $_POST['first_name_user'] != ""
        isset($_POST['login_user']) and $_POST['login_user'] != ""
        and isset($_POST['mdp_user']) and $_POST['mdp_user'] != ""){
            $name_user = $_POST['nom_article'];
            $first_name_user = $_POST['first_name_user'];
            $login_user= $_POST['login_user'];
            $mdp_user=$_POST['mdp_user'];

            //CODE :Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //requête simple qui va insérer le contenu

            try{
                $req = $bdd->prepare("insert into users (name_user,) values (?,?,?,?)");
                
                $req->bindParam(2,$name_user,PDO::PARAM_STR);
                $req->bindParam(1, $first_name_user,PDO::PARAM_STR);
                $req->bindParam(3, $login_user,PDO::PARAM_STR);
                $req->bindParam(3, $mdp_user,PDO::PARAM_STR);
                
              
                
                $req->execute();
                echo"<p>User enregistré en BDD</p>";

            }catch(Exception $error){
                var_dump("<p>".$error."</p>");
            }




        }
    ?>
        
        




