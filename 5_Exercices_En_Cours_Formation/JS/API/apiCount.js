//EXO API FETCH

// ** contacter une api - fetch() - async - await
// TODO 1: récupérer le titre h2 dans une variable counter

// TODO 2-1: créer une variable majCounter à laquelle on assigne une fonction fléchée
// TODO 2-2: dans la F =>, créer une variable data à laquelle on assigne la fonction fetch()
// TODO 2-3: fetch(), prend en param l'Url de l'API

// TODO 3-1: Tjrs dans la F =>,créer une variable dataTransformed à laquelle on assigne data
// TODO 3-2: sur la variable data on utilise la fonction .json()
// TODO 3-3: Faire un console log de data

// TODO 4-1: Tjrs dans la F =>,au InnerHTML de counter, assigner la value dans dataTransformed
// TODO 4-2: remmettre le filter de counter en "blur(0)"
// TODO 5: on éxecute notre fonction majCounter quelquepart dans notre programme (modifié)



//1
let counter = document.getElementById('counter');
console.log(counter);

//2-1

const majCounter= async ()=>{
    const data= await fetch("https://api.countapi.xyz/hit/hola/visitas"); 
    console.log(data);
    

    const dataTransformed = await data.json();
    console.log(dataTransformed);
    counter.innerHTML=dataTransformed.value;
    counter.style.filter='blur(0)';
}

majCounter();
//Correction//

/*/const counter = document.getElementById('counter');
//de base une ƒ° => est anonyme, astuce pour désanonymiser, on la stocke dans une variable
const majCounter = async () => {
    //Data va récup Toutes les données de l'api
    const data = await fetch('https://api.countapi.xyz/hit/sltcava/visites');
    console.log(data);
    //Plutot que de Travailler sur la réponse, on va la transformé pour 
    //qu'elle deviennt un OBJET JS (+ pratique)
    const dataTransformed = await data.json();
    console.log(dataTransformed);
    counter.innerText = dataTransformed.value;
    counter.style.filter = 'blur(0)';
};
majCounter();*/
