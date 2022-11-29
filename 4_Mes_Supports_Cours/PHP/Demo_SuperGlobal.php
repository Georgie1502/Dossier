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
        <input type="text" name="prenom">
        <input type="number" name="age">
        <input type="submit">
    </form>

    <?php
    /*Vérification si champ vide ou non*/
        /*1) Vérifier si la variable existe et n'est pas null*/
        //isset($_POST["prenom"]);
        /*2) Vérifier si la variable n'est pas vide*/
        //$_POST["prenom"] != "";

    /*On combine le tout pour avoir notre condition final*/
    /*if(isset($_POST["prenom"]) AND $_POST["prenom"] != ""){
        echo "<br>Formulaire Valide";
    }else {
        echo "<br> ERROR";
    };*/


    /*Vérification pour tout le formulaire*/
    if(isset($_POST["prenom"]) AND $_POST["prenom"] != ""
    AND isset($_POST["age"]) AND $_POST["age"] != ""){
        echo "<br>Formulaire Valide";
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
    }else {
        echo "<br> ERROR";
    };

    /*Vérification champ par champ*/
    if(isset($_POST["prenom"]) AND $_POST["prenom"] != ""){
        echo "<br>Prénom Valide";
        $prenom = $_POST["prenom"];
    }else {
        echo "<br> il manque le prénom";
    };
    if(isset($_POST["age"]) AND $_POST["age"] != ""){
        echo "<br>âge Valide";
        $age = $_POST["age"];
    }else {
        echo "<br> il manque l'âge";
    };

?>
</body>
</html>