<h2>Tableau à index numérique <h2>
    <?php

    $tab = array("Yoann", "Matheu", "Sophie", "Yann");
    var_dump ($tab);

    foreach($tab as $value){
        echo "<br>$value";
    }

    echo "<br><br><br>";

    /*Tableau Associatif*/
    $tab2 = array(
        "prenom" => "Yoann",
        "nom" => "Depriester",
        "role" => "Formateur"
    );
    foreach($tab2 as $key => $value){
        echo "<br>$key";
        echo "<br>$value";
        echo "<br>$key = $value";
    }
?>

<h2> Exercice 10 <h2>

<?php

/*Exercice 10 :
-Créer une fonction qui affiche la valeur la plus grande du tableau.
$tab = array(10, 25,6,33, 58,1,49,110);
nb : (fonction aura besoin d'un tableau en paramètre).*/

    $tab = array(10, 25,6,33, 58,1,49,110);
    $max= 0;
    //$max=$tab[0]; pour commencer dans la case 1ere.
    foreach($tab as $value){ 
        //(nom_de_tablau as variable)
       if ($max<=$value){
        //$max pour stocker ma valeur max et je voudrais q soit la valeur
        //plus grand
        $max=$value; 
       }
        //je dois le mettre al exterier de mon foreach pour arreter 
        //jusqu'au el trouve sa valeur max .
       }echo"<br>".$max;
       
?>


<h2> Exercice 11 <h2>
    
<?php

/*-Créer une fonction qui affiche la valeur la plus petite du tableau.
$tab = array(10, 25,6,33, 58,1,49,110);
nb : (fonction aura besoin d'un tableau en paramètre).*/


foreach($tab as $value){
    if ($max>$value){
     $max=$value; 
    }
     
    }echo"<br>".$max;

?>

<h2> Exercice 12 <h2>

<?php
    
/*-Créer une fonction qui affiche la moyenne du tableau.
(nb : il est utile d'utiliser la fonction sizeof()  ou count()  ) */
$tab3 = array(10, 25,6,33, 58,1,49,110);

function maMoyanne($tab3){
    $moyanne=0;
    foreach($tab3 as $value){
    $moyanne = $moyanne + $value;
    }
    echo"<br>". $moyanne/sizeof($tab3);
}
maMoyanne($tab3);
?>


<h2> Exercices 13 <h2>



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
        <input type="nombre" name="nombre1">
        <input type="nombre" name="nombre2">
        
        <input type="submit">
    </form>



<?php

/*
-Créer une page de formulaire dans laquelle on aura 2 champs de formulaire de type nombre.
-Afficher dans cette même page la somme des 2 champs avec un affichage du style :
La somme est égale à : valeur.*/

if(isset($_POST["nombre1"]) AND $_POST["nombre1"] != ""
//ce n'est pas null et ne pas vide  
and isset($_POST["nombre2"]) AND $_POST["nombre2"] != ""){
    echo "<br>Formulaire Valide";
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $maSommeTotal = $nombre1 + $nombre2 ;

    echo "Ma somme est <br>".$maSommeTotal; 

    }else {
        echo "<br> ERROR";
    };

?>

<h2> Exercice 14 <h2>
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
        <input type="nombre" name="prixHT" step="0.01">
        <input type="nombre" name="nomArt">
        <input type="nombre" name="TVA" step="0.01">
        
        <input type="submit">
    </form>


<?php
/*-Créer une page de formulaire dans laquelle on aura 3 champs de formulaire de type nombre :
1 champ de formulaire qui demande un prix HT d’un article,
1 champ de formulaire qui demande le nombre d’article,
1 champ de formulaire qui demande le taux de TVA,
-Afficher dans cette même page le prix TTC (prix HTtaux TVAquantité) avec un affichage du style :
Le prix TTC est égal à : valeur €. (utilisez le mode post).*/

if(isset($_POST["prixHT"]) AND $_POST["prixHT"] != ""
//ce n'est pas null et ne pas vide  
and isset($_POST["nomArt"]) AND $_POST["nomArt"] != "" and
 isset($_POST["nomArt"]) AND $_POST["TVA"] != ""){
    echo "<br>Formulaire Valide";
        $prixHT = $_POST["prixHT"];
        $nomArt = $_POST["nomArt"];
        $TVA= $_POST["TVA"];
        $prixTTC = $prixHT*$nomArt*(1+($TVA/100)) ;
        echo "Le prix TTC est égal à :<br>".$prixTTC. "<br>€.";

    }else {
        echo "<br> ERROR";
    };

?>

<h2> Exercice 15 <h2>

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
        <p>Saisir son nom :</p>
        <input type="text" name="nom">
        <p>Saisir son genre :</p>
        <select name="genre" >
            <option value="1">
                Femme
            </option>
            <option value="2">
                Homme
            </option>
            <option value="3">
                Autre
            </option>   
        </select>
        <p>Saisir votre competence :</p>

        <label name="box[]">Leader</label>
        <input type="checkbox" name="box[]" value="Leader">

        <label name="box[]">Diplomate</label>
        <input type="checkbox" name="box[]" value="Diplomate">

        <label name="box[]">Commercial</label>
        <input type="checkbox" name="box[]" value="Commercial">

        <label name="box[]">Technicien</label>
        <input type="checkbox" name="box[]" value="Technicien">

        <label name="box[]">Comptable</label>
        <input type="checkbox" name="box[]" value="Comptable">
        <p><input type="submit" value="Afficher"></p>
    </form>
</body>
</html>

<?php
//Afficher le nom, et le genre sélectionné dans la page. 
//(méthode post).nb : utilisation d'un switch case pour faciliter le test du genre.

if(isset($_POST["nom"]) AND $_POST["nom"] != ""
//ce n'est pas null et ne pas vide  
and isset($_POST["genre"]) AND $_POST["genre"] != ""){
    $nom= ($_POST["nom"]);
    $genre= ($_POST["genre"]);

    switch($genre){
        case 1 :
            echo "<p>.$nom est une femme.<p>";
            break;
            case 2 :
                echo "<p>$nom est un Homme.</p>";
                break;
            case 3 :
                echo "<p>$nom est tout Autre.</p>";
                break;
    }

}

/*Exercice 16 :
- Reprenez l'Exercice 15.
- Rajoutez des checkbox Compétences :
          + Leader
          + Diplomate
          + Commercial
          + Technicien
          + Comptable
Afficher le nom, le genre, et la liste des compétences 
*/

if(isset($_POST["box"]) and $_POST["box"] != ""){
    $tab = $_POST["box"];
   $phase="<p>Vos compétences sont :" ;
    foreach($tab as $value){ 
        $phase = $phase."".$value. ",";
        
}
echo "$phase </p>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display : flex;
            flex-direction : column;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Calculez votre score de DEV</h2>
        <label for="score[]">Vous aimez le Ctrl+C / Ctrl+V ?</label>
        <input type="checkbox" name="score[]" value="1">

        <label for="score[]">Vous avez un canard en plastique ou en peluche ?</label>
        <input type="checkbox" name="score[]" value="2">

        <label for="score[]">Vous parlez à votre canard quand vous avez un problème ?</label>
        <input type="checkbox" name="score[]" value="3">

        <label for="score[]">Vous êtes Dev Full Stack ?</label>
        <input type="checkbox" name="score[]" value="4">

        <label for="score[]">Vous codez en Cobol ?</label>
        <input type="checkbox" name="score[]" value="5">
        <input type="sumit" >
    </form>
</body>
</html>

<?php
/*Exercice 17 :
Sur la base du HTML suivant, afficher le score d'un Dev, en faisant la somme la point :
- première checkbox = 5 points
- 2nd checkbox = 20 points
- 3eme checkbox = 20 points
- 4eme checkbox = 10 points
- 5eme checkbox = -50 points
*/

if(isset($_POST["score"]) AND $_POST["score"] != ""){
//ce n'est pas null et ne pas vide 
    $tabl= ($_POST["score"]);
    $score=0;

    foreach($score as $value){

        if(isset($_POST["score2"]) and $_POST["score2"] != ""){
            $tab2 = $_POST["score2"];
            $score2 = 0;
            foreach($tab2 as $value){
                if($value == 1){
                    $score2 += 5;
                }else if($value == 2 or $value == 3){
                    $score2 += 20;
                }else if ($value == 4){
                    $score2 += 10;
                }else if ($value == 5){
                    $score2 -= 50;
                }
            }
            echo "<p>Votre score de Dev est égal à $score2 points.</p>";
        }

            }
    }echo "$phase </p>";


?>