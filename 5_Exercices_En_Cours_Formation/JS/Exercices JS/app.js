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


// ? La notion de scope (la portée d'une variable)
// ? Dans l'exemple ci-dessous on a 2 fois la même variable testScope1 qui est déclarée ?????
// ? En fait même si elles ont le même nom ce ne sont pas les même espaces mémoires qui sont alloués
// ? let testScope1 = 99; est dans le scope global de notre programme 
// ? let testScope1 = 12; est dans le scope de la fonction
console.log('-------SCOPE-------');

let testScope1 = 99;

function maFonctionTestScope(){
    let testScope1 = 12;
    console.log('scope de la fonction :',testScope1);
};
maFonctionTestScope();
console.log('scope hors de la fonction :',testScope1);


//! EXO 5.1 : Quizz Function
//TODO : Pourquoi ca beug ?
 let wtf = 10;
function buggyFunction() {
    let wtf = 9;
    console.log(wtf);
}; 
buggyFunction();
console.log(wtf);


//! EXO 5.1.2 : Quizz Function
//TODO : Pourquoi ca beug / Pourquoi ca marche pas ?

let something = 44;
function functionBugParent() {
    let something = 9;
    console.log(something);
    functionBugEnfant();//on va executer la ƒ° au moins une fois QQpart
  

    function functionBugEnfant() {
        let lesNews = `
        Scoop : Alerte Épervier !
        un volcan vient de PT en Ardèche.
        `;
        console.log(lesNews);//Plutot ici le console.log lesNews
        
    }
};
functionBugParent();
console.log(something);


//EXO 5.2 FUNCTION : la moyenne 
//! EXO 5.2 : La moyenne de 2 notes 
//TODO: Créer une fonction qui calcule la moyenne de 2 notes
//TODO: Afficher le résultat en console


let noteSport = 8;
let notePhilo = 2;
let laMoyenne = moyenne2notes(notePhilo,noteSport);
// On peut executer la ƒ° AVANT de la définir (pas d'ordre pour décrire les fonctions)
function moyenne2notes(a,b){
    return (a+b)/2;
};
console.log('La moyenne des 2 notes : ',laMoyenne);

//!-------OPERATEURS DE COMPARAISON-------
// ? on peut utiliser == (égalité) & != (différent de) pour comparer 2 variables
// ? Cela nous renvoit un BOOLEAN (true ou false)
let a=1;
let b=2;
console.log(a==a);
console.log(a==b);
console.log(a!=a);
// ? Plus d'autres opérateurs de comparaison (on connait déjà)
console.log(a>b);
console.log(a<b);
console.log(a>=b);
console.log(a<=b);

//!-------CONDITIONS TERNAIRES-------
// ? on combine un opérateur de comparaison et l'opérateur ? pour établir une condition qui return une chose ou une autre chose
// ? cela permet de faire une condition if (simple) avec une syntaxe racourcie
let whatIsYourAge = 6;
console.log(whatIsYourAge >18 ? '🍹':'👮‍♂️');
// Astuce pour check si une variable est définie (si ya QQchose dans son espace mémoire)
let userPremium;
// On check si une variable est définie la condition c'est juste uneVariable ?
console.log(userPremium?'OK 🤙':'FLC👺');
// ↑ c'est l'équivalent de ↓
console.log(userPremium ==true?'OK 🤙':'FLC👺');
// on doit lui assigner QQCHOSE
userPremium = 'YES';
console.log(userPremium?'OK 🤙':'FLC👺');
// ? On peut utiliser des operateur aussi pour combiner des conditions && (pour ET) || (pour OU)
console.log(3==3&&3<4);
let typeUtilisateur = 'Extra';
console.log(typeUtilisateur == 'Extra' || typeUtilisateur == 'Premium');


//!-------CONDITION avec IF ELSE-------
// ? Avec if on va pouvoir créer un bloc de code qui s'execute si une condition est remplie
function calculTableResto(nombreDeReservation) {
    if (nombreDeReservation>=30){
        return 'il nous reste pas beaucoup de tables, ca serait pour combien de personnes ? (en sueur😅)';
    }
    else if(nombreDeReservation<10){
        return 'Il nous reste une table'
    }
    else{
        return 'On est fermé !'
    }
};
console.log(calculTableResto(50));


//! EXO 7 - IF ELSE
// TODO: Créer une fonction reçoit un tableau de 3 notes et qui calcule une moyenne entre ces 3 notes
// TODO: Dans cette ƒ°, SI la moyenne est suppérieur ou égale à 15 on renvoi une string (très Bien) 
// TODO: Dans cette ƒ°, SINON SI la moyenne est suppérieur ou égale à 10 on renvoi une string (assez Bien) 
// TODO: Dans cette ƒ°, SINON renvoi une string (refus)

function msgMentionBacOfficiel(tabNotes) {
    let moyenneCalc = (tabNotes[0]+tabNotes[1]+tabNotes[2])/tabNotes.length;
    console.log('la Moyenne au Bac : ',moyenneCalc);
    if (moyenneCalc>=16) {
        return "Tu as Gagné !"
    } else if (moyenneCalc >=10 && moyenneCalc<16) {
        return 'Assez Bien'
    } else {
        return 'YO T NUL GRO'
    }
};
console.log(msgMentionBacOfficiel([13,6,3]));


function mentionBac(tabNotes) {
    let moyenneCalc = (tabNotes[0]+tabNotes[1]+tabNotes[2])/tabNotes.length; //Calcule la moyanne
    console.log('la Moyenne au Bac : ',moyenneCalc);
    if (moyenneCalc>=16) {
        return "Tu as Gagné !"
    } else if (moyenneCalc >=10 && moyenneCalc<16) {
        return 'Assez Bien'
    } else {
        return 'YO T NUL GRO'
    }
};
console.log(mentionBac([13,6,3]));






