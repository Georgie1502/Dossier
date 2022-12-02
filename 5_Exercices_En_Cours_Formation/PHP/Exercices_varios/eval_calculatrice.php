<!--Petite Evaluation - calculatrice :
1 Récupérer le contenu des 3 champs de formulaire (test avec isset) 
2 Tester la valeur de l'opérateur (si +, -, /, *) (utiliser un switch case)
effectuer l'opération dans chaque cas du switch case.
vérifier les erreurs (mauvais opérateur). 
utiliser la méthode round($valeur, 2) pour afficher le résultat avec 2 chiffres après la virgule. 
Petit Rappel : une Division par zéro est impossible. N'oubliez pas de traiter ce cas-->

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
        <input type="number" name="nbr1">
        <p>Saisir un nombre :</p>
        <input type="number" name="nbr2">
        <p>Saisir un Opérateur (+,-,*,/) :</p>
        <input type="text" name="operateur">
        <p><input type="submit" value="Calculer"></p>
    </form>

    <?php
        if(isset($_POST["nbr1"]) and $_POST["nbr1"]!=""
        and isset($_POST["nbr2"]) and $_POST["nbr2"]!=""
        and isset($_POST["operateur"]) and $_POST["operateur"]!=""){
            $nbr1 = $_POST["nbr1"];
            $nbr2 = $_POST["nbr2"];
            $operateur = $_POST["operateur"];

            switch($operateur){
                case "+":
                    echo"Le résultat de l'addition est égale à : ".($nbr1 + $nbr2);
                    break;
                case "-":
                    echo"Le résultat de la soustraction est égale à : ".($nbr1 - $nbr2);
                    break;
                case "*":
                    echo"Le résultat de la multiplication est égale à : ".($nbr1 * $nbr2);
                    break;
                case "/":
                    if($nbr2 == 0){
                        echo"ERROR : Division par zéro impossible";
                    }else {
                    echo"Le résultat de la division est égale à : ".(round(($nbr1 / $nbr2),2));
                    }
                    break;
                default :
                    echo"ERROR : entrez un opérateur valide";
                    break;
            }
        } else {
            echo"ERROR : remplissez correctement le formulaire";
        }
    ?>
</body>
</html>
