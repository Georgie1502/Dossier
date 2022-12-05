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
</body>
</html>