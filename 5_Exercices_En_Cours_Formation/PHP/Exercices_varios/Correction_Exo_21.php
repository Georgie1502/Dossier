<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display:flex;
            flex-direction:column;
            width:350px;
        }

        form * {
            margin-bottom:1em;
        }
    </style>
</head>
<body>
    <h3>Enregistrement User et Import Fichier Image</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Creéation User</label>
        <input type="text" name="login_user" placeholder="entrez votre login">
        <input type="password" name="mdp_user" placeholder="entrez votre mot de passe">
        <label>Import de l'image</label>
        <input type="file" name="file">
        <input type="submit">
    </form>

    <?php
        if(isset($_POST['login_user']) and $_POST['login_user']!=""
        and isset($_POST['mdp_user']) and $_POST['mdp_user']!=""
        and isset($_FILES['file'])){
            //récupération des infos de mon user
            $login_user = $_POST['login_user'];
            $mdp_user = $_POST['mdp_user'];

            //récupération des infos de mon fichier
            //var_dump($_FILES['file']);
            $tmp_name = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];

            //récupération de l'extension du fichier
            $fichier = new SplFileInfo($name);
            $ext = $fichier->getExtension();

            if($ext == "jpg" or $ext == "png" or $ext == "gif"){
                //déplacement de mon image vers le dossier que je souhaite
                $moveFile = move_uploaded_file($tmp_name,"img/$name"); /*->Je dois m'assurer que le dossier 'img' existe bien*/
                $url_img = "img/$name";

                //intitaliser la connection à la BDD
                $bdd = new PDO('mysql:host=localhost;dbname=compte','root','',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                try{
                    //Requête préparé
                    $req = $bdd->prepare('insert into users (login_user, mdp_user) values (?,?)');

                    //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
                    $req->bindParam(1,$login_user,PDO::PARAM_STR);
                    $req->bindParam(2,$mdp_user,PDO::PARAM_STR);

                    //Exécution de la requête
                    $req->execute();

                    //Message de validation
                    echo"<p>L'utilisateur a bien été enregistré.</p>";

                    //Nouvelle requête pour récupérer l'id_user enregistré
                    $req = $bdd->prepare('select id_user from users where login_user = ?');
                    //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
                    $req->bindParam(1,$login_user,PDO::PARAM_STR);
                    //Exécution de la requête
                    $req->execute();

                    //stocke la réponse de la BDD
                    $data = $req->fetchAll();

                    //j'extrait la donnée que je veux, depuis mon tableau de tableaux associatifs $data
                    $id_user;
                    foreach($data as $row){
                        $id_user = $row['id_user'];
                    }

                    //Nouvelle requête pour enregistrer l'image
                    $req = $bdd->prepare('insert into image (url_img, id_user) values (?,?)');

                    //Binding de Paramètre -> j'injecte les infos de mon user dans la requête
                    $req->bindParam(1,$url_img,PDO::PARAM_STR);
                    $req->bindParam(2,$id_user,PDO::PARAM_INT);

                    //Exécution de la requête
                    $req->execute();

                    //Affiche message de confirmation
                    echo"<p>L'image a bien été enregistré.</p>";

                    //fermeture de la connexion
                    $req=null;
                    $bdd=null;

                }catch(Exception $error){
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$error->getMessage());

                    //fermeture de la connexion
                    $req=null;
                    $bdd=null;
                }


            } else {
                echo'<p>ERROR : format de fichier non valide. Veuillez utiliser du JPG, PNG ou GIF.</p>';
            }
        } else {
            echo'<p>ERROR : Formulaire mal complété.</p>';
        }
    
        //Je veux afficher mes images
        //1) Je vais les récupérer en BDD

        //Initialise une nouvelle connexion
        $bdd = new PDO('mysql:host=localhost;dbname=compte','root','',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête Select
        $req = $bdd->prepare('select * from image inner join users on image.id_user = users.id_user;');
        //Exécution de la requête
        $req->execute();

        //Récupération de la réponse de la BDD
        $data = $req->fetchAll(); /*-> data est un tableau contenant des tableaux associatifs*/

        //fermeture de la connexion
        $req=null;
        $bdd=null;
        
        //2) J'affiche mes users avec leur image
        foreach($data as $row){
            echo"<h3>Login : ".$row['login_user']."</h3>
            <img src='".$row['url_img']."'>";
        }

    ?>
</body>
</html>