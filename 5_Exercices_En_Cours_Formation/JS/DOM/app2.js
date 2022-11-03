//!-------INTRO DOM-------
// ? Pour selectionner TOUS les éléments getElementsByTagName('leNomDuTagHtml')
let lesParag = document.getElementsByTagName('p');
// let lesParag = document.body.getElementsByTagName('p');
console.log(lesParag);
// ? On peut modifier une propriété de 1 paragraphe
lesParag[0].innerText = 'YOLO MDR MDR';
// ? On accède à la 1ère case du HTMLCollection
console.log(lesParag[0]);


//!EXO 20.1 : Récupérer UN élément par son Id
// TODO : De la mêmê manière créer une variable qui stocke un
//TODO : elements HTML mais par son ID


let idGood = document.getElementById ('titre');
console.log('Récup par le id :',idGood);

//!EXO 20.2 : Récupérer DES éléments par leurs class
// TODO : De la mêmê manière créer une variable qui stocke un
//TODO : TOUS elements HTML mais par leurs classes css

let maSuperClasse = document.getElementsByClassName('cool');
console.log('Récup par le class :',maSuperClasse);

// ? Une alternative : Avec les ƒ° querySelector() et querySelectorAll()
let premierParag = document.querySelector('p');
console.log('1er p',premierParag);
let tousLesParag = document.querySelectorAll('p');
console.log('Tous les p via querySelectorAll',tousLesParag);
let paragCoolId = document.querySelector('#coolRaool');
console.log('le p avec le id coolRaool',paragCoolId);
let lesParagParClasse = document.querySelectorAll('.cool');
console.log('Tous les p avec la class cool',lesParagParClasse);
let le1erParagParClasse = document.querySelector('.cool');
console.log('le 1er p avec la class cool',le1erParagParClasse);


//!-------OBJETS-------
// ? Un peu similaire au objets (sauf système d'index), pour stocker plusieurs données dans 1 variable
// ? syntaxe  { uneProprieté:uneValeur } 
// ? dans un objet on assigne avec :
let user = {
    id:3657826,
    'name':'Seagal',
    firstname:'Steven',
    badges:['🎥','👮‍♂️','🎸','🥋','🎤']
};
console.log(user);
console.log(user.id);
console.log(user['id']); //tablau assosiative 
console.log(user.name);
console.log(user.badges[3]);// systeme d'indice 
// ? On peut ajouter simplement des propriétés dans un objet avec une assignation de valeur
// ? Si on assigne à une propriété déjà existante cela écrase la valeur
// ? Mais Si on assigne à une propriété déjà existante cela écrase la valeur
user.dps = 9999;
// console.log(user);
// ? On peut supprimer une propriété 
delete user.badges;
console.log(user);
// ? une ƒ° native de JS poour connaitre les propriétés d'un objet, hasOwnProperty()
let menuDuJour={
    entree:"Bassine d'Aioli",
    plat:"Rat Adulte",
    dessert:'île Fidji'
};
console.log(menuDuJour);
console.log(menuDuJour.hasOwnProperty('entree'));


// ! EXO 8 OBJECTS
// TODO : Refaire l'exo avec les passions en mode objet

let eleve = {
    'Nom' :"VIRE",
    'Age':34 ,

    'Passions': {
        passion1:'cuisiner',
        passion2:'danser'
    }
};



console.log(eleve.Nom);
console.log(eleve.Passions.passion2);


//!-------INTRO DOM-------
const leTitre = document.querySelector('#coolRaool');
const tousLesP = document.getElementsByTagName('p');
//? On utilise la ƒ° sur le body de document
//? insertBefore demande 2 paramètres
//?  On inseère QUOI avant QUOI
document.body.insertBefore(tousLesP[0], leTitre);

//? Une fonciton dans JS pour supprimer un élément
document.body.removeChild(tousLesP[2]);

//? Une fonciton dans JS pour Créer du Texte
const newTxt = document.createTextNode('DU texte Youhouuuuu');
document.body.append(newTxt);

//? Une fonciton dans JS pour Créer tous types de balises HTML
const newH1 = document.createElement('h1');
newH1.innerText = 'LOL'
document.body.append(newH1);
// Pour remplacer un element par un autre element
//document.body.replaceChild(tousLesP[1], tousLesP[2]);


/*/*EXO 20.1 
Créer une ƒ° ajouterTexte qui prend 2 params : 
pseudo et duTexte

La fonction a pour but :
de créer puis remplir et enfin placer un paragraphe contenant pseudo et duTexte*/

const newFunction = document.createTextNode ('alléluia alléluia alléluia alléluia');
document.body.append(newFunction);