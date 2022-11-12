// PARAMETRE PAR DEFAUT
// Si à l'utilisation de la ƒ° on oubli le paramètre
//  Pas d'érreur car le param par défaut sera 'sarah'
function sayTheName(unNomBidon='Sarah'){
    console.log(unNomBidon);
};
sayTheName();



// !------------- LES BOUCLES ------------------
let listeFilm = ['Ultime Décision','Mission Alcatraz','Attack Force'];
console.log(`
---------
UN TABLEAU 
---------
${listeFilm}
`);
//** Boucle for
//? Boucle for, on définit un index (ici c'est i), 
//? puis on définit une condition qui va définir le nombre de fois que le code dans la boucle sera éxecuter
//? puis on définit comment on passe à la prochaine itération de la boucle (ici i++, on augmente de 1 le numero de la case que l'on console.log)
for(i=0;i<listeFilm.length;i++){
    console.log('boucle FOR : ',listeFilm[i]);
};

//** Avec forEach()
//? La méthode forEach() permet d'exécuter une fonction donnée sur chaque élément du tableau.
// ? On va choisir une variable temporaire pour parcourir les elements du tableau
listeFilm.forEach(unFilm => console.log('boucle forEach Tableau : ',unFilm));

//** Avec for ... of 
//? L'instruction for...of permet de créer une boucle Array qui parcourt un objet itérable 
//? (ce qui inclut les objets Array, Map, Set, String, TypedArray, l'objet arguments, etc.) 
//? et qui permet d'exécuter une ou plusieurs instructions pour la valeur de chaque propriété.
// on définit une variable temporaire pour parcourir le tableau
for(let unElementTablo of listeFilm){
    console.log('boucle FOR...OF : ',unElementTablo);
};




//** Avec for ... in pour les objet
const userData = {
    name: 'John Doe',
    email: 'john.doe@example.com',
    age: 25,
    dob: '08/02/1989',
    active: true
};

console.log(`
---------
UN OBJET 
---------
`,userData);
// on définit une variable temporaire pour parcourir le objet :)
for(let cleObjet in userData){
    console.log(`boucle FOR...IN (objet) : clé:${cleObjet} - valeur :  ${userData[cleObjet]} `);
    // console.log(`boucle FOR...IN (objet) : clé:${cleObjet} - valeur :  ${userData.cleObjet} `);
};

//? Parcourir les Objet  (Depuis javaScript ES8)
//? La Method .keys() qui convertit les clés d'un objet en tableau
//? La Method .values() qui convertit les valeurs d'un objet en tableau
//? La Method .entries() qui renvoit un tableau dans un tableau pour combiner clé - valeur
const keyUser = Object.keys(userData);
console.log("les clé de l'objet converties en array : ",keyUser);

const valuesUser = Object.values(userData);
console.log("les valeur de l'objet converties en array : ",valuesUser);

const convertedDataUser = Object.entries(userData);
console.log("les entrées de l'objet converties en array : ",convertedDataUser);

// De fait, une fois les objets convertis en tableau  on peut ruser et utiliser forEach par exemple : 
valuesUser.forEach((lesValeurs)=>{
    console.log(`FOREACH avec objet converti en tableau chaque valeurs : ${lesValeurs}`);
});
convertedDataUser.forEach(([key, value])=>{
    console.log(`FOREACH avec objet converti en tableau : ${key}: ${value}`);
});


// ! EXO 9.1 :  MAP
// TODO :JS map phase 1
// TODO : côté template html rajouter plein de <p></p>
// TODO :On va récupérer TOUS les <p> de notre page dans une variable lesTxt via getElementsByTagName
// TODO :On va faire un console log de lesTxt


let lesTxt= document.getElementsByTagName('p');
console.log(lesTxt);

//TODO JS map Phase 2 
//TODO Avec la methode Array.from(), dans une nouvelle variable textesTab on va transformer notre htmlCollection en array
//TODO On console log la variables textesTab


const textesTab= Array.from(lesTxt);
console.log(textesTab);

//TODO JS Map Phase 3 (on peut travailler sur un Array)
//TODO Sur textesTab on va utiliser la ƒ° map(),
//TODO dans map(), on va lui passer en param une fonction fléchée qui elle a en parametre une variable temporaire (auChoix)
//TODO cette fonction fléchée elle va modifier le innerHTML ou innerText de la variable temporaire




textesTab.map(a => a.innerHTML = "LOL JE SUIS HACKERwoman" );

//textesTab.map(uneCase => uneCase.innerHTML = "LOL JE SUIS HACKERMAN" );



//? bonus syntaxe en ƒ° classic
//! Dans la fonction que l'on passe dans map(), si on met un 2nd param
//! C'est l'index du tableau
textesTab.map(function(x,i){
    x.style.color = "red";
    console.log(i)
});

//? bonus syntaxe en ƒ° fléchée
// textesTab.map((x) => x.style.color = "red");
// console.log(textesTab);
//? Bonus II le retour : utilisation de map pour placer un addEventListener sur chaque <p>
textesTab.map(toto => toto.addEventListener('click',function(){
console.log("SUPER CA CLICK")
}));


//EXO event LOAD 

//HTML : 
//On a rajouter plein de grandes images 


// ** addEventListener - load
// TODO 1: récupérer toutes les images dans une variable lesImages
// TODO 2: Dans une v ariable tabImg on transforme lesImages en tableau avec Array.from()
// TODO 3-1: Sur tabImg on utilise la fonction map().
// TODO 3-2: Dans map(), on lui passe une F => qui prend 2 params : uneImage et index
// TODO 3-3: Dansla F =>, sur uneImage on place un addEventListener qui écoute "load" et éxecute une Fonction
// TODO 3-4: Dans la F du addEventListener, on affiche index en console


/*const lesImages=document.getElementsByTagNameNS('img');

const tabImg=Array.from(lesImages);
console.log(tabImg);

tabImg.map(function(uneImage,index){
    uneImage.addEventListener('load',function(){
        console.log(`Image numéro : ${index}-vient de finir de charger` );

    });

}); */

let lesImages = document.querySelectorAll(`img`);
console.log(lesImages);
let tabImg = Array.from(lesImages);
console.log(tabImg);
tabImg.map(function (uneImage, index) {
    uneImage.addEventListener('load', function () {
        console.log(`Image numéro : ${index} – vient de finir de charger.`);
    });
});

// ** setTimeout() - innerHtml - opacity - backgroundColor
// TODO 1: Dans une variable monTitre, récupérer le titre h2
// TODO 2: on execute le fonction setTimeout() qui prend 2 paramètres: une fonction et un nombre (les miliseconde)
// TODO 3: dans la fonction en param de setTimeout(),modifier dans le style de monTitre l'opacité  que l'on met à 1
// TODO 3-2: modifier dans le style de monTitre le background color  que l'on met à (couleur au choix)
// TODO: 3-3: assigner une chaine de caractères (au choix) au innerHTML de monTitre 



let monTitre = document.querySelector(`h2`);


 setTimeout (b,5000);
    function b() {
        monTitre.style.opacity=1;
        monTitre.style.backgroundColor="red";
        monTitre.innerHTML="parfait";
        
    }



/*CORRECTION
const monTitre = document.querySelector("h2");

setTimeout(function() {
    monTitre.innerText = "SALUT C'EST SUPER Génial";
    monTitre.style.color = "white"
    monTitre.style.opacity = 1;
    document.body.style.background = "royalblue";
}, 2000);*/




 /*/ EXO SetInterval 
// ** Executer 1 script ttes les X sec - addEventListener - click - innerHTML
// TODO 1: récupérer le titre h3 dans une variable monTitre
// TODO 2: créer une variable timer initialisée à 3
// TODO 3-1: sur monTitre on place un addEventListener qui surveille le click et qui exécute une fonction
// TODO 3-2: Dans cette fonction, créer une variable countDown à laquelle on assigne la fonction setInterval()
// TODO 3-3: setInterval() prend en 1er param, une fonction et en 2e param 1000 ms
// TODO 4-1: Dans la fonction de setInterval(), SI timer est supperieur à 0, on assigne au innerHTML de monTitre, timer
// TODO 4-2: SINON, on assigne au innerHTML de monTitre, "GO GO GO"
// TODO 5: Après ces conditions, on décrémente timer

Envoyer un message dans #javascript*/

/*     setInterval(function () {element.innerHTML += "Hello"}, 1000);  */

//1
/*const titulo = document.querySelector("h3");

let timer=3;
titulo.addEventListener("click",function(){
    const countDown=setInterval(function(){
        if (timer>0 ) {
           titulo.textContent=timer;
        }
        else{
            titulo.textContent = "go go go";
        console.log(timer);}

        clearInterval(countDown);
        timer--;

    },1000);

    });*/

/* CORRECTION*/

const Titre = document.querySelector("h3");

let timer = 3;

Titre.addEventListener("click", function(){
    const countDown = setInterval(function() {
        if(timer > 0) {
            Titre.textContent = timer;
        }
        else{
            Titre.textContent = "GO GO GO";
            console.log(timer);
            //Pour ne pas gaspiller des performances pour rien
            // C'est pour ca qu'on a stocker le setInterval dans une variable countDown 
            clearInterval(countDown);
        }
        console.log(timer);
        timer--;
    },1000);
});
 
/*EXO Prevent Default 

HTML : 
faire un formulaire qui contient un input type text 
et un button
[15:02]
// ** preventDefault - addEventListener - "submit" - form.reset()
// TODO 1: récupérer le formulaire dans une variable monForm
// TODO 2-1: sur monForm on place un addEventListener qui écoute "submit" et qui exécute une fonction qui a event en paramètre (on veut capter l'event)
// TODO 2-2: Dans cette fonction, sur event on utilise la fonction preventDefault()
// TODO 3-2: Puis on console log event
// TODO 3-3 : sur monForm on utilise la fonction .reset()*/

/*const monForm= document.querySelector("input");

monForm.addEventListener("submit",function(event){
    event.preventDefault();
    console.log(event);
    console.log("ok");
    monForm.reset();


});*/


const monForm = document.querySelector("form");

monForm.addEventListener("submit", function(event){
    event.preventDefault();
    console.log("OK");
    console.log(event);
    monForm.reset();
});

//EXO addEventListener Keyup : un editeur de texte (google Docs en Sueur)

// ** mini éditeur de texte - addEventListener - keyup - innerHTML
// TODO 1: récupérer le textarea dans une variable monTxt
// TODO 2: récupérer la div dans une variable rendu
// TODO 3-1: sur monTxt on place un addEventListener qui surveille le clavier et qui exécute une fonction
// TODO 3-2: Dans cette fonction, au innerHTML de rendu on assigne la VALEUR contenue dans monTxt 
    
    

const monTxt = document.querySelector('textarea');

const rendu = document.querySelector("div");

monTxt.addEventListener('keyup',function(){
    rendu.innerText= monTxt.value;
});

//monTxt.addEventListener("keyup", function() {
    //rendu.innerHTML =marked(monTxt.value);
    // Version traduite en marked 
    // rendu.innerHTML = marked(monTxt.value);
    // rendu.innerText = monTxt.value;
    //Dans le innerHtml on lui assigne la Value de ce que 
    //L'utilisateur tape dans le input / textarea
    // rendu.innerHTML = monTxt.value;
//});


//Exo LOCALSTORAGE

// ** Sauvegarder dans localStorage - getItem() - setItem() - innerHTML
// TODO 1: récupérer le textarea dans une variable monTxt
// TODO 2: récupérer la div dans une variable rendu
// TODO 3: à la valeur contenue dans monTxt on assigne localStorage, sur localStorage on utilise la fonction getItem("monSuperTexte")
// TODO 4-1: ensuite, SI la valeur dans monTxt est définie,
// TODO 4-2: alors on assigne au innerHTML de rendu, localStorage sur lequel on utilise la fonction getItem("monSuperTexte")
// TODO 5-1: Sur monTxt on place un addEventListener qui surveillle le clavier et exécute une fonction
// TODO 5-2: Dans cette fonction, sur localStorage on utilise la fonction setItem
// TODO 5-3: setItem() prend en 1er param "monSuperTexte", et en 2e param la valeur contenue dans monTxt
// TODO 5-4: on assigne au innerHTML de rendu la valeur contenue dans monTxt

/*if (monTxt.value){

rendu.innerText= localStorage.getItem("monSuperTexte");}

  

monTxt.addEventListener("keyup",function(){

localStorage.setItem('monSuperText', monTxt.value);


rendu.innerHTML=marked(monTxt.value);
});
*/

// const monTxt = document.querySelector("textarea");
// const rendu = document.querySelector("div");
//On va pré remplir le textarea avec ce que l'on récupère dans le localStorage
monTxt.value = localStorage.getItem('monSuperTexte');
//Si monTxt.value est définit alors on rempli la Div avec ce qu'on récupère dans le local storage
if(monTxt.value){
    rendu.innerText = localStorage.getItem('monSuperTexte');
};
//On détecte ce que tape l'utilisateur dans le textarea
monTxt.addEventListener("keyup", function() {
//On enregistre ce que tape l'utilisateur dans le localStorage sous le nom "monSuperTexte"
localStorage.setItem('monSuperTexte',monTxt.value);
//On affiche ce que tape l'utilisateur traduit en marked dans la div     
    rendu.innerHTML =marked(monTxt.value);
});

//!------------Supprimer un listener d'evenements--------------
const leLink = document.querySelector('a');
function monClic(){
    console.log('Hello Ca Clique');
    leLink.removeEventListener('click',monClic);
};
leLink.addEventListener('click',monClic);