<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <p><a href="page1.php">page 1</a></p>
        <p><a href="page2.php">page 2</a></p>
        <p><a href="deconnexion.php">déconnexion</a></p>
    </header>

    <main>
        <h1>Accueil</h1>
        <form action="" method="post">
            <input type="text" name="prenom" placeholder="entrez votre prenom pour vous connecter">
            <input type="submit">
        </form>
    </main>
</body>
</html>

<?php
    session_start();

    if(isset($_POST['prenom']) and $_POST['prenom']!=''){
        $_SESSION['prenom_user'] = $_POST['prenom'];

        echo $_SESSION['prenom_user']." est connecté.";
    }

    if(isset($_SESSION['prenom_user'])){
        echo $_SESSION['prenom_user'];
    }

    if(!isset($_SESSION['prenom_user'])){
        echo "<p>personne n'est connecté.</p>";
    }

    if(isset($_SESSION['page1'])){
        echo "<p>J'ai visité la page 1.</p>";
    }

    if(isset($_SESSION['page2'])){
        echo "<p>J'ai visité la page 2.</p>";
    }
?>