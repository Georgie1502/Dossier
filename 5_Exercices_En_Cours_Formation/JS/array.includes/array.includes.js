



const noVoyellesTab = []; //pour acumile les condision false 
const voyelles = ["a","e","i","o","u","y"];
const vocal=document.querySelector("#voyalle");


vocal.addEventListener('keypress',function(event){
    console.log(event)
    const clavier= event.key; //lettre à chaque lettre

    if (!voyelles.includes(clavier)){
    noVoyellesTab.push(clavier);
    

   }
   console.log(noVoyellesTab.join("-")); //je vais choisir quel caracter je vais mettre en ma case



}
    
)

//Correction
/*const noVoyellesTab = [];
const voyelles = ["a","e","i","o","u","y"];
const leTexte = document.querySelector("input");

leTexte.addEventListener("keyup", function(unEvent){
    console.log(unEvent)
    const uneTouche = unEvent.key;
    //Si uneTouche n'est pas incluse dans le tab des voyelle
    //Alors on range uneTouche dans le tab noVoyellesTab via push
    if(!voyelles.includes(uneTouche)) {
        noVoyellesTab.push(uneTouche);
    }
    console.log(noVoyellesTab.join("toto"));
});*/

//EXO Random + Array

//TODO faire une fonction melangerTab qui prend un tableau en paramètre**
//TODO On aura besoin d'une variable random qui va stocker un nombre random, arrondi entre 0 et 6**
//TODO Dans cette fonction on va parcourir avec une boucle les cases du tableau
//TODO Se débrouiller pour intervertir les cases de façon random (on aura peut être besoin d'une variable temporaire)
//TODO Après la boucle for la fonction retourne le tableau reçu en paramètre
//TODO En dehors de la fonction, dans un console log on va executer la fonction en lui passant un tableau de 6 chiffres

//exemple d'utilisation :


function melangerTab (tableau){
    var variT= 0;
    var random= 0;

    
    for (let i=0; i< tableau.length; i++){
        random= Math.floor(Math.random()*tableau.length);
        variT=tableau[i];
        tableau[i]=tableau[random];

    }
    return tableau;

   
};
console.log(melangerTab([1,2,3,4,5,6]));


