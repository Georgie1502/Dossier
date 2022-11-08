// ** addEventListener - classList.add() - classList.remove() - classList.toggle()
// En CSS on crée une classe maCouleur (vous modifiez ce que vous voulez)
// TODO 1: récupérer le titre dans une variable leTitre
// TODO 2: récupérer tous les liens dans une variable lesLiens
// TODO 3-1: Sur le 1er lien placer un addEventListener qui écoute le "click" et éxecute une fonction
// TODO 3-2: Dans cette fonction on ajoute la classe "maCouleur" sur titre
// TODO 4-1: Sur le 2e lien placer un addEventListener qui écoute le "click" et éxecute une fonction
// TODO 4-2: Dans cette fonction on supprime la classe "maCouleur" sur titre
// TODO 4-1: Sur le 3e lien placer un addEventListener qui écoute le "click" et éxecute une fonction
// TODO 4-2: Dans cette fonction on toggle la classe "maCouleur" sur titre**//


//1//seleccionamos mi h1
let leH1 = document.querySelector('h1');
console.log(leH1);

//2// autre option querySelectorAll à la place de getElementsByTagName 
let mesLiens= document.getElementsByTagName('a');
console.log(mesLiens);

//3.2//
mesLiens[0].addEventListener('click',function(){
    leH1.classList.add("maCouleur") 

});

//4-1-2//
mesLiens[1].addEventListener('click',function(){
        leH1.classList.remove("maCouleur") 
    
});
//4-1-2//
mesLiens[2].addEventListener('click',function(){
            leH1.classList.toggle("maCouleur") 
});

    
// ** addEventListener - "mouseout" - display
// EN CSS le titre H1 à un display à none
// TODO 1: Dans une variable monTitre, récupérer tous le titre h1
// TODO 2: Sur document, placer un addEventListener qui écoute "mouseout" et qui execute une fonction
// TODO 3: dans cette fonction, on va modifier dans le style de monTitre le display que l'on met à "block"
    
//1
    let monTitre= document.querySelector('h2');
    console.log(monTitre);



 //2
    document.addEventListener('mouseout',function(){
    monTitre.style.display="block"; 
    monTitre.style.color="red"; 
    monTitre.style.backgroundColor="green"; 
});

// ** addEventListener - focus - blur
// TODO 1: récupérer l'input dans une variable leInput
// TODO 2-1: sur leInput, utiliser addEventListener pour surveiller "focus" 
// TODO 2-2:et execute une fonction qui modif la bg color de leInput en (couleur au choix)
// TODO 3-1: sur leInput, utiliser addEventListener pour surveiller "blur"
// TODO 3-2: et execute une fonction qui modif la bg color de leInput en blanc ou transparent


let leInput=document.querySelector('input');
console.log (leInput);

leInput.addEventListener('focus',function (){
   
    leInput.style.backgroundColor='royalBlue';
    

});


leInput.addEventListener('blur', function(){
    
    leInput.style.backgroundColor='blanc';
    

});


/*/EXO 24.4
[14:07]
// TODO 1: récupérer le textarea dans une variable txt
// TODO 2: récupérer le button dans une variable btn
// TODO 3-1: Sur txt placer un addEventListener qui écoute les touches clavier "keyup" et éxecute une fonction
// TODO 3-2: Dans cette fonction, si ce qu'on tape dans l'input dépasse 5 caractères alors on désactive le button */

//1//OK
//let tex = document.querySelector('textarea');


//2//OK

//let btn = document.querySelector('button');


/*tex.addEventListener('keyup',
() => {
    
    if (tex.value.length>=4) {
        btn.disabled = true;
    }
    else {
        btn.disabled = false;
    }
    



});
*/

const monTextArea = document.querySelector('textarea');
const monBtn = document.querySelector('button');
console.log(monTextArea);
console.log(monBtn);

monTextArea.addEventListener('keyup',()=>{
    /*if(monTextArea.value.length>=5){
       monBtn.disabled = true;
    }
    else{
        monBtn.disabled = false
    }
});*/

monBtn.disabled= monTextArea.value.length>=5 ? true :false;
});


// TODO : Sur tout le document on va ecouter l'event keyup
// TODO en réaction à cet event on va faire un console.log('Yes je peux ecrire')


addEventListener('keyup',function (unEvent) {
    console.log('Yes moi ecrire');
    console.log(unEvent);
   
});

//EXO 24.5 
// ** addEventListener - capter un évènement "click" - coord x - coord y
// TODO 1: sur document, placer un addEventListener qui écoute le "click" et éxecute une fonction qui a unEvent en paramètre
// TODO 2: Dans cette fonction on console log unEvent 
// TODO 3: à partir du console log retrouver les propriétés de unEvent qui correspondent au coordonnées du click

//document.addEventListener('click',function(unEvent){
   // console.log('les coord :' ,unEvent.x,unEvent.y);
   

//});


// TODO 4: Tjrs dans la Fonction dans addEventListener, dans une variable monImg, créer une img html
// TODO 5: Ensuite, modifier l'attribut src de monImg (url de l'img au choix)
// TODO 6: sur monImg, modifier dans style, la position en "absolute"
// TODO 7: sur monImg, modifier dans style, le left, on assigne la coordonnées x du click
// TODO 8: sur monImg, modifier dans style, le top, on assigne la coordonnées y du click
// TODO 9: placer monImg dans la page


//let monImg= document.querySelector('img');

document.addEventListener('click',function(deux){

    let monImg= document.createElement('img'); //on creer la variable qui cree l'image

    monImg.style.position='absolute'; // on modifie le type de position de l'image

    monImg.style.left=deux.x +'px'; // on modifie la position left de l'image

    monImg.style.top=deux.y + 'px';// on modifie la position top de l'image

    monImg.setAttribute('src','Screenshot-2019-10-13-at-08.webp');// on rajoute une src à l'image 

    document.body.append(monImg);  //On place l'image fraichement créee dans le body de la page



   //* EXO ALGO Tableau 
 //- Dans une variable on a un tableau de plusieurs chiffres 
//- Créer une fonction dans laquelle on va faire +1 sur chaque case du tableau 


function tableauN

   
    
    

 
   

})


