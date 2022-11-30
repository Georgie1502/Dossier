<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calulatrice :</title>
</head>
<body>
    <form action="" method="post">
        <p>Saisir un nombre :</p>
        <input type="text" name="nbr1">
        <p>Saisir un nombre :</p>
        <input type="text" name="nbr2">
        <p>Saisir un Opérateur (+,-,,/) :</p>
        <input type="number" name="operateur">
        <p><input type="submit" value="Calculer"></p>
    </form>
</body>
</html>
<h1>Petite Evaluation - calculatrice : <h1>;
    <?php
    /*
1 Récupérer le contenu des 3 champs de formulaire (test avec isset) 
2 Tester la valeur de l'opérateur (si +, -, /,) (utiliser un switch case)
effectuer l'opération dans chaque cas du switch case.
Bonus : vérifier les erreurs (mauvais opérateur). 
Bonus : utiliser la méthode round($valeur, 2) pour afficher le résultat avec 2 chiffres après la virgule.*/
 
//Verification
if(isset($_POST["nbr1"]) and $_POST["nbr1"] != ""
AND isset($_POST["nbr2"]) and $_POST["nbr2"] != ""
AND isset($_POST["operateur"]) and $_POST["operateur"] != ""){

//Recuperation des champs

    $nbr1 = $_POST["nbr1"];
    $nbr2 = $_POST["nbr2"];
    $op= $_POST["operateur"];

//Calcul 

//qu'est on verifie!
    switch( $op )
    {
        case 1 : 
            $result = $nbr1 + $nbr2;
            break;
        case 2: 
            $result = $nbr1 * $nbr2;
            break;
        case 3: 
            $result = $nbr1 - $nbr2;
            break;
        case 5: 
            $result = $nbr1 / $nbr2; 
            break;
        default : 
    }
 
    echo"Résultat:<br>$result</br>" ;
    
}




    
   

 
