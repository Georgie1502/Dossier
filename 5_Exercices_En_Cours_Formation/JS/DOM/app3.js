//! EXO 20.1 
//TODO: Créer une ƒ° ajouterTexte qui prend 2 params : pseudo et duTexte
//TODO: La fonction a pour but :
//TODO: de créer puis remplir et enfin placer un paragraphe contenant pseudo et duTexte, dans la page
// TODO (Bonus) : Dans le paragraphe le pseudo est affiché en gras


function newFunction(unPseudo,duTexte){
    const nouveauTexte = document.createElement('p');
    nouveauTexte.innerHTML = `<strong>${unPseudo}</strong> - ${duTexte}`; 
    document.body.append(nouveauTexte);

};
newFunction('JOsé','Gracia');
newFunction('Grigny','La grande Borne');
newFunction('Roi','Heenok');
newFunction('Dongue','Rodrigue');

//!-------INTRO DOM MODIF ATTRIBUTS-------
let monH2 = document.querySelector('h2');
let monLien = document.querySelector('a');
let premierP = document.querySelector('p');

// ? setAttribute pour ajouter un attribut Html à un élément

monH2.setAttribute('title','COCO LASTICO');
monLien.setAttribute('href','https://developer.mozilla.org/fr/docs/Web/API/Node/insertBefore');
console.log(monH2);

// ? getAttribute pour récuperer la valeur d'un attribut Html d'un élément
console.log(premierP.getAttribute('class'));