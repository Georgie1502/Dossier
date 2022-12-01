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

        /*Exercice 19-  PROJET TASK Partie 1 
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
-Utiliser une requête SQL préparée.*/
    ?>

    <form action="" method="post">
        <input type="text" name="name_users" placeholder="entrez votre nom">
        <input type="text" name="first_name_users" placeholder="entrez votre prénom">
        <input type="text" name="login_users" placeholder="entrez votre identifiant">
        <input type="text" name="mdp_users" placeholder="entrez votre mot de passe">
        <input type="submit" value="Ajouter user">
    </form>

    <?php
        if(isset($_POST['name_users']) and $_POST['name_users']!=""
        and isset($_POST['first_name_users']) and $_POST['first_name_users']!=""
        and isset($_POST['login_users']) and $_POST['login_users']!=""
        and isset($_POST['mdp_users']) and $_POST['mdp_users']!=""){
            $name_users = $_POST['name_users'];
            $first_name_users = $_POST['first_name_users'];
            $login_users = $_POST['login_users'];
            $mdp_users = $_POST['mdp_users'];

            //connexion à ma bdd
            $bdd = new PDO('mysql:host=localhost;dbname=task2','root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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

         //connexion à ma bdd
         $bdd = new PDO('mysql:host=localhost;dbname=task2','root','root',
         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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


         /*BONUS EXERCICE 19 :
- Afficher la liste des utilisateurs dans un formulaire. Chaque utilisateur aura une checkbox à côté de lui.
- Le Formulaire contiendra un input Submit qui aura pour Value = "Supprimer utilisateur"
- Ecrire une requête qui permet de supprimer de la bdd les utilisateurs cochés*/
    ?>
    <h3>EXERCICE BONUS</h3>
    <form action="" method="post">
        <ul>
            <?php
                 //connexion à ma bdd
                    $bdd = new PDO('mysql:host=localhost;dbname=task2','root','root',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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

        </ul>
        <input type="submit" value="Supprimer">
    </form>

    <?php
        if(isset($_POST['box']) and $_POST['box'] != ""){
            $tabUsers = $_POST['box'];

            //connexion à ma bdd
            $bdd = new PDO('mysql:host=localhost;dbname=task2','root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
</body>
</html>