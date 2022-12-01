<!-- Exercice 20 : -->

<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<form action="" method="POST" enctype="multipart/form-data">
<h2>importer une image</h2>
<input type="file" name="file">
<p><button type="submit">importer</button></p>
</form>
</html>


<!-- Exercice TP 1 
Réalisez le TP file import (importer des images->BDD): -->

<?php
if (isset ($_FILES['file'])){
    var_dump($_FILES['file']);
    $tmp_name = $_FILES['file']['tmp_name'];
    $img_name = $_FILES['file']['name'];

 //Récupère l'extension du fichier
 $Ext = new SplFileInfo($img_name);
 $tablauExt = $Ext -> getExtension();
 if($tablauExt== 'jpg'){

    $taille = getimagesize($tmp_name);


//affichage du tableau
var_dump($taille);
$width=$taille[0];
$height=$taille[1];


if($width<=800 and $height<=800){
    //Déplacement fichier
    $fichier = move_uploaded_file($tmp_name, "image/$img_name");
    echo 'Fichier importé avec succès';
} else {
    echo'ERROR : image trop grande.';

}
} else {
echo 'ERROR : type de fichier invalide.';
}

}
?>
</body>
</html>

<!-- 2) Dans un fichier php, créer le HTML d'un formulaire pour enregistrer des Users, et importer des images 
3) Créer le script php permettant d'enregistrer en BDD les Users avec leur image
4) Ajouter un paragraphe qui affiche que l'enregistrement s'est bien passé, ou bien un message d'erreur
Bonus :
5) Vérifier que les images soient bien des fichier de type JPG ou PNG ou GIF
6) En dessous du formulaire, afficher le login des Users, ainsi que leurs images -->

<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
   
<form action="" method="POST" enctype="multipart/form-data">
<h2>Exercice 20</h2>
<input type="text" name="name_user" placeholder="Entrez votre name user" >
<input type="text" name="password" placeholder="Entrez votre password">
<input type="file" name="file">
<p><button type="submit">importer</button></p>
</form>
</html>

<?php

//les inputs de type file sont stocké dans des super globales $_FILES
if(isset($_FILES['file']) and
 isset($_POST['name_user']) and $_POST['name_user'] != ""
 isset($_POST['password']) and $_POST['password'] != ""){
   
    $tmp_name = $_FILES['file']['tmp_name'];
    $nameU = $_FILES['file']['name'];

    $password=$_POST['password'];
    $user=$_POST['name_user'];




//Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=compte','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


try{

    //Version simple
    ;
        
    

    echo"<p>Article enregistré en BDD</p>";

}catch(Exception $error){
    var_dump("<p>".$error."</p>");
}    


{ 
}
 }


?>
