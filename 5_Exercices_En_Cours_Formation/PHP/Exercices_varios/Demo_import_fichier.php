<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Import de Fichier JPG</h3>
    <!-- ATTENTION : Ne pas oublier l'attribut enctype dans le form-->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="ajouter fichier">
    </form>

    <?php
        //les inputs de type file sont stocké dans des super globales $_FILES
        if(isset($_FILES['file'])){
            $tmp_name = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            
            //Récupère l'extension du fichier
            $ext = new SplFileInfo($name);
            $tabExt = $ext->getExtension();
            if($tabExt == 'jpg'){
                //récupère les dimensions d'une image
                $dimension = getimagesize($tmp_name);

                //affichage du tableau
                var_dump($dimension);
                $width=$dimension[0];
                $height=$dimension[1];


                if($width<=800 and $height<=800){
                    //Déplacement fichier
                    $fichier = move_uploaded_file($tmp_name, "import/img/$name");
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