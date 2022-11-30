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
        <input type="text" name="login_user" placeholder="entrez votre login">
        <input type="text" name="name_user" placeholder="entrez votre nom">
        <input type="submit">
    </form>

    <?php

    //Verification
if(isset($_POST["login_user"]) and $_POST["login_user"] != ""
AND isset($_POST["name_user"]) and $_POST["name_user"] != ""){

//Recuperation des champs

    $login = $_POST["login_user"];
    $name_user = $_POST["name_user"];

// Connexion BDD

$bdd = new PDO('mysql:host=localhost;dbname=users','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//comme on gere les erreurs 

try{
    
   //requête classique interdite d'utilisation
                //$req = $bdd->query("insert into users (login_user, name_user) values ('$login', '$name_user')");

                //Version Sécurisé avec requête préparée
                /*$req = $bdd->prepare("insert into users (login_user, name_user) values (:login,:name_user)");
                $req->execute(array(
                    'login' => $login,
                    'name_user' => $name_user
                ));*/

                //Version la plus sécurisé avec du Binding Parameter
                $req = $bdd->prepare("insert into users (login_user, name_user) values (?,?)");
                
                $req->bindParam(2,$name_user,PDO::PARAM_STR);
                $req->bindParam(1,$login,PDO::PARAM_STR);
              
                
                $req->execute();
                echo"<p>User enregistré en BDD</p>";

            }catch(Exception $error){
                var_dump("<p>".$error."</p>");
            }
        }