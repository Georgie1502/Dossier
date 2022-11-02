console.log('hello world')

variable='car'

console.log(variable);

let monNumFetiche; //assignation
monNumFetiche=77; // Déclaration + ASSIGNATION
let maVariable= 11;
let uneAutreVariable= 'Steven Seagal';
let monTabloClient=['Client1', maVariable,109];
let uneVariableObjet={
    //Propiétes de l'objet (auxquelles on assigne des valeur mais avec les: pas le =)
    'Chuck Norris':99,
    'Steven Seagal':100,
    
};

    console.log(monNumFetiche);
    console.log(uneAutreVariable);
    console.log(monTabloClient);

    //Afficher différents calculs dans la console du navigateur

    //Exo 2

    let monNumero=2;
    let monautreNumero= 5;

    console.log(monNumero+monautreNumero);
    console.log(monNumero-monautreNumero);
    console.log(monNumero/monautreNumero);
    console.log(monNumero*monautreNumero);

    //Troll pour les décimales 
    

    console.log(2.33+10);

    //Incrémentation

    let num=0;
    console.log(num+1);

    //Pour faire du Cumul

    //num=num+1;

    num=+1;

    //num = num +5;
    num = +5;

    //Notation raccourcue incrémentation de 1

    console.log(num++);
    console.log(num--);


// Exo 3

let salue='Bonjour'

console.log(salue + ' mr."GINGLE" ');
console.log(salue +  " J'aime la quiche ");

//Exo 3.2

let nom ='Margarita';
let age='81';
let phase='Bonjour '  +  nom + ' tu as ' +  age + " ans aujourd'hui c'est la fiesta! " ;

console.log(phase);


//Technique TEMPLATE STRINGS

let phaseWelcome = `"Bonjour" ${nom} tu as '${age}' c'est trop cool`;
console.log(phaseWelcome);


//Exo 3.3 String

let monMot='Toujours'

console.log(monMot.length);
console.log(monMot.charAt(1));
console.log(monMot.charAt(7));

//! EXO 3.3 :  STRINGS
//TODO: Créer une variable qui contient un mot
//TODO: Trouver un moyen d'afficher le nombre de lettre que contient ce mot 
//TODO:dans la console du navigateur (faut trouver la longueur du mot en gros!)
//TODO : Afficher en console uniquement la seconde lettre du mot
//TODO : Afficher en console uniquement la dernière lettre du mot
let nomPays = 'FRANCE';
console.log(nomPays.length);
console.log(nomPays[1]);
// Pour trouver automatiquement la dernière lettre
console.log(nomPays[nomPays.length -1]);

//ARRAY

let unTablo = [11,90,888888];

console.log(unTablo[2]);

//Exo 4 ARRAYS

//! EXO 4 ARRAYS 
//TODO: Créer 1 variable pour un nom, 
//TODO: Créer une variable pour un age, 
//TODO: Créer une variable passions qui est un tableau qui contient 2 chaines de caractères (au choix)
//TODO: Puis créer une variable tabUser qui est un tableau qui contient les variable du nom, de l'age et passions
//TODO: en Console on affiche le tabUser
//TODO : en passant par tabUser on veut afficher en console uniquement les passions 

let Nom ="VIRE";
let Age= 34;

let Passions= ["Cuisiner","Danser"];

let tabUser = [Nom,Age,Passions];

console.log(tabUser);
console.log(tabUser[2]); //c'est le tablo passions
console.log(tabUser[2][1]);// dans passions (tabUser[2]) on accède à la case


//!EXO 4.3 ARRAYS Ajout
//TODO : créer un nouveau tableau qui contient des trucs
//TODO : allez fouiner la ƒ° push()
//TODO : utiliser push pour ajouter un nouveau truc au tableau
//TODO: On affiche en console ce tableau

let superTablo = ['Italie', 'Bolivie', 'France', 'Argentine'];
console.log(superTablo);

superTablo.push('Mexico','Canada');
console.log(superTablo);

//Exo 4.4
let leNom = "Hernandez";

let lePrenom= "Simone";

let laPhase = []  ;

let initiales = lePrenom[0] + leNom[0];

console.log(initiales);

laPhase.push(leNom,lePrenom,initiales)
console.log(laPhase);

//!EXO 4.3 Ajout ƒ° .pop()
// pop pour suppr le dernier element du tableau
//testTabAjout.pop();
//console.log(testTabAjout);

//! EXO 4.4 ARRAYS 
// TODO:  Créer 2 variables leNom et lePrénom 
//TODO: Créer un tableau laPhrase et on y ajoute via (push)Le nom ,Le prénom Les initiales
//TODO: Afficher le tableau dans la console le nom le prénom et les initiales
//let leNom = 'Garcia';
//let lePrenom = 'José';
//let initiales = lePrenom[0] + leNom[0];
//let laPhrase = [];
//laPhrase.push(leNom, lePrenom , initiales)
//console.log(laPhrase);

//*********FONCTIONS*********///


//On déclare la fonction et le travail qu'elle doit faire 

function maSuperFonction(){
    // ici on code ce que doit faire la f°

    console.log('Ma fonction fonctionne');
    console.log(10+2);
}

//on va exec au moins 1 fois notre f°
maSuperFonction();
//Quand une f° a besoin de parametres 

function disMonNom(unNomBidon){
    console.log(unNomBidon);
}
disMonNom('Jacko');


//! EXO 5 : Function
// TODO : créer une fonction qui prend un nombre en paramètre
// TODO : La ƒ° doit afficher en console 33 + le nombre en paramètre
// TODO : créer une autre fonction qui prend 2 nombres en paramètre
//TODO : Cette seconde ƒ° doit afficher en console l'ADDITION des 2 nombres reçus en paramètre 

function plat(salee){
    console.log(33+salee);

}

plat(7);

function platDeux(salee,soleil){
    console.log(soleil+salee);

}

platDeux(10,88);

// Quand une fonction doit retour quelque chose 

function moins(a,b){
    return a-b;
}

//à l'execution de la f° le resultat (ce que ça renvoit/ return)
//sera stocké dans une variable

let monResultat = moins(99,20);
console.log(moins(99,20));
