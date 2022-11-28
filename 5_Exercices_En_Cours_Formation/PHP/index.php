<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Exercices PHP</h1>

    <?php 
    /* echo"<p> Hello wolrd </p>";

    $phrase = "jojo le rigolo";
    $nombre = 5;
    $bool = true;
    $bool2 = false;

    echo $phrase;
    echo "<p> n'importe quoi </p> $phrase";

    //concaténation
    echo "<p> n'importe quoi </p> $phrase";*/

?>
<h2> Exo 1 </h2>
<?php
//Exercice 1 :
//1-Créer une variable de type int avec pour valeur 5,
//2-Afficher le contenu de la variable (utilisation de la fonction php echo),
//3-Afficher son type (utilisation de la fonction php gettype),
//4-Créer une variable de type String avec pour valeur votre prénom,
//5-Afficher le contenu de la variable (utilisation de la fonction php echo),
//6-Créer une variable de type booléen avec pour valeur false,
//7-Afficher son type (utilisation de la fonction php gettype).*/

    
//1


$maVariable = 5;

//2
 echo "$maVariable<br>";

//3
 echo gettype($maVariable)."<br>" ;

//4
 $prenom= "Jorgelina"."<br>";

 //5
 echo "$prenom";

 //6
 $bool3 = false;

 //7
 echo gettype($bool3)."<br>";
 ?>
<h2> Exo 2 </h2>

<?php
/* Exercice 2 :
-Créer 2 variables $a et $b qui ont pour valeur 12 et 10,
-Stocker le résultat de l’addition de $a et $b dans une variable $total,
-Afficher le résultat (utilisez la fonction echo)*/

$a = 12;
$b = 10;

$total = $a + $b;

echo "$total"."<br>";
?>

<h2> Exo 3 </h2>

<?php
/*Exercice 3 :
-Créer 2 variables $a et $b qui ont pour valeur 15 et 23,
-Afficher la valeur de chaque variable (utilisez la fonction echo).,
-Intervertissez les valeurs de $a et $b,
-Afficher la valeur de $a et $b (utilisez la fonction echo).*/

$a = 15;
$b = 23 ; 

echo "A = $a , B = $b "."<br>";

$nouvelle = $a; 
$a = $b;
$b = $nouvelle;

echo "A = $a , B = $b "."<br>";

?>

<h2> Exo 4 </h2>

<?php
/*-Ecrire une fonction qui prend en paramètre (le prix HT d’un article, le nombre d’articles et le taux de TVA),
 et qui retourn le prix total TTC correspondant.
-Afficher le prix HT, le nbr d’articles et le taux de TVA (utilisez la fonction echo),
-Afficher le résultat (utilisez la fonction echo).*/

function prix ($Ht,$nomArt,$TVA){
$total = $Ht*$nomArt*$TVA/100 + $Ht*$nomArt;
//$total = $Ht*$nomArt*(1+($TVA));version reducida.
//calculer le tva = (prix multiplicado por el numero de articulos X la TVA /100) +
// precio de articulo multiplicado por el numero de articulos

return $total;
}
echo "Le prix total s'élévé à  ". prix (15 , 2 , 20) .  "euro";

?>
<h2> Exo 5 </h2>

<?php
/*-Créer une fonction qui teste si un nombre est positif ou négatif (echo dans la page web).
Bonus : traiter le cas est égal à 0.*/

function e ($numero){

    if ($numero < 0 ){
        echo 'negatif';

    } else if ($numero==0 && $numero>0) {
        echo 'c\'est égal à ';
        echo 'positif';
        
    }
    
}
echo e(5)."<br>";
echo e(-5)."<br>";
echo e(0)."<br>";

?>
<h2> Exo 6 </h2>

<?php

/*Exercice 6 :
1-Créer une fonction qui prend en entrée 3 valeurs et renvoie la somme des 3 valeurs.
2-Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus grand (echo dans la page web).
3-Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus petit (echo dans la page web).
4-Créer une fonction qui prend en entrée 3 valeurs et retourne la moyenne (echo dans la page web).*/

//1
function somme ($j,$o,$r){
    $full= $j+$o+$r;

    return $full;
}
echo "la somme de mes valeurs est ". somme (2,1,1)."<br>";

//2

function plusGrand ($v,$i,$d){
    if ($v>$i && $v>$d){
    echo "le valeur plus grand est " .$v;

} else if ($i>$v && $i>$d){
echo "le valeur plus grand est".$i;
}
else if($d>$i && $d>$v){
    echo "le valeur plus grand est".$d;

}}
echo plusGrand(25,1,5)."<br>";

//3

function plusPetit ($Rome,$Italie,$Brazil){
    if ($Rome<$Italie && $Rome<$Brazil){
    echo "le valeur plus petit est " .$Rome;

} else if ($Italie<$Rome && $Italie<$Brazil){
echo "le valeur plus petit est".$Italie;
}
else if($Brazil<$Italie && $Brazil<$Rome){
    echo "le valeur plus petit est".$Brazil;

}}
echo plusPetit(12,25,5). "<br>";

//4

function moyanne ($janvier, $mars, $fevrier){
    $boite =$janvier + $mars + $fevrier / 3;
    return $boite;

}
echo "La moyanne des valeurs est  ". moyanne (5 , 10, 20) .  "<br>";

?>  
<h2> Exo 7 </h2>

<?php
/*-Créer une fonction qui prend en entrée 1 valeur (l’âge d’un enfant). Ensuite, elle informe de sa catégorie (echo dans la page web) :
    • "Poussin" de 6 à 7 ans
    • "Pupille" de 8 à 9 ans
    • "Minime" de 10 à 11 ans
    • "Cadet" après 12 ans
    Bonus : Refaire l’exercice en utilisant le switch <case class="*/

    function age ($enfant){
        
            if($enfant<6){
                echo "trop jeune";
            } else if ($enfant>=6 && $enfant<=7){
            echo "Poussin";
        } else
         if ($enfant>=8 && $enfant<=9){
            echo "Pupille";
         } else 
         if ($enfant>=10 && $enfant<=11){
                echo "Minime";
        }else 
      
            echo "Cadete";
    }

    echo age (7)."<br>";
    echo age (8)."<br>";
    echo age (10)."<br>";
    echo age (13)."<br>";
    echo age (9)."<br>";
    echo age (2)."<br>";




?>  
<h2> Exo 8 </h2>

<?php

/*Exercice 8 :
Créer un script qui affiche les nombres de 1 -> 5 (méthode echo).*/

for ( $i=0; $i<6; $i++ ){
    echo "<br>". $i;
}

?> 
<h2> Exo 9 </h2>
<?php

/*Ecrire une fonction qui prend un nombre en paramètre (variable $nbr), et qui ensuite affiche les dix nombres
suivants. Par exemple, si la valeur de nbr équivaut à : 17, la fonction affichera les nombres de 18 à 27 (méthode
echo).*/

function cat($nb){
    
         for ($i=18; $i<28; $i++ ){
            echo "<br>".$i;
        }
    }

 cat( 17);
 cat (5);
?>


</body>
</html>