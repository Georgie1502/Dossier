const firebaseConfig = {

    apiKey: "AIzaSyCfHdYfrR2aHLQV0xiuo_-yy9ydvt7Wmfk",
  
    authDomain: "monprojet-44759.firebaseapp.com",
  
    databaseURL: "https://monprojet-44759-default-rtdb.firebaseio.com",
  
    projectId: "monprojet-44759",
  
    storageBucket: "monprojet-44759.appspot.com",
  
    messagingSenderId: "752676315067",
  
    appId: "1:752676315067:web:c72a0e44ca21f073a8ae9e",
  
    measurementId: "G-7HK77J2SW8"
  
  };
  
  
  firebase.initializeApp(firebaseConfig);
    //On va créer une référence à notre BDD
    const dbRef = firebase.database().ref(); // quelle reference 
    // On va également faire une ref directement dans le noeud / """"table""""" users
    const usersRef = dbRef.child('users');
  


 /*function readUserData(){
        const userListUI = document.getElementById("user-list");
        usersRef.on("value", snap =>{
            userListUI.innerHTML = "";
            snap.forEach(childSnap => {
                let key = childSnap.key;
                let value = childSnap.val();
                let $li = document.createElement('li');

                $li.innerHTML = value.name;

                let deleteIconUI = document.createElement('span');

                deleteIconUI.setAttribute("class" , "delete-user");
                deleteIconUI.innerHTML="x";
                deleteIconUI.setAttribute("userid" ,key);

                deleteIconUI.addEventListener("click", deleteButtonClicked(Event

                ){
                    document.getElementById("event.target.getAttribute ");

                };

                $li.setAttribute('user-key', key);
                userListUI.append($li);
            });
        })
        
    };
    readUserData();*/

    function readUserData(){
        const userListUI = document.getElementById("user-list");
        usersRef.on("value", snap =>{
            userListUI.innerHTML = "";
            snap.forEach(childSnap => {
                let key = childSnap.key;
                let value = childSnap.val();
                let $li = document.createElement('li');
                //* à la lecture de chaque user dans la BDD on rajoute une icone pour supprimer
                let deleteIconUI = document.createElement("span");
                deleteIconUI.class = "delete-user";
                deleteIconUI.innerHTML = " ❌";
                //* Sur les icone en face du nom du user on rajoute un attribut qui contient la key
                //* on veut savoir qui on supprime au click
                deleteIconUI.setAttribute("userid", key);
                deleteIconUI.addEventListener("click", deleteButtonClicked);
                $li.innerHTML = value.name;
                $li.append(deleteIconUI);

                $li.setAttribute('user-key', key);
                userListUI.append($li);
            });
        })
        
    };

    function deleteButtonClicked(event) {
        console.log(event);
        // event.stopPropagation();
        //* On récupère l'ID de l'utilisateur que l'on veut supprimer via un getAttribute
        //* (cf. la fonciton readUserData(vers la fin, le setAttribute)).
        let userID = event.target.getAttribute("userid");
        //* Dans la BDD on vise 1 user en particulier
        const userRef = dbRef.child('users/' + userID);
        //* Bonus une autre manière de récup le <p></p> qui contient le nom user
        console.log(`ADIOS ${event.path[1].innerText}`);
        //* Enfin sur cet utilisateur on utilise la fonction .remove()
        userRef.remove();
      };



//* AJOUTER
//TODO 1: Récupérer le bouton avec l’id add-user-btn° 
//TODO 2: sur ce bouton placer un addEventlistener au click et qui lance la fonction addBtnClicked
//TODO 3: Créer la fonction addUserBtnClicked 
//TODO 4: Dans la ƒ° addUserBtnClicked, Récupérer la référence à notre BDD directement sur le noeud users
//TODO 5: Dans la ƒ° addUserBtnClicked, Récupérer dans 1 variable addUserInputsUI (les input pour rajouter un user qui ont la classe user-input) 
//conseil utiliser getElementsByClassName
//TODO 6: Dans la ƒ° addUserBtnClicked, créer une variable newUser (qui est un objet vide)
//TODO 7: Dans la ƒ° addUserBtnClicked, faire une boucle for pour parcourir les input dans addUserInputsUI
//TODO 8: Dans la Boucle, Pour chaque éléments parcourus on récupère Dans 1 variable key = addUserInputsUI[i].getAttribute('data-key');
//TODO 9: Dans la boucle, 1 variable value = addUserInputsUI[I].value
//TODO 10: Dans la boucle, Pour chaque clé (âge, name, email) on l’associe à notre nouvel utilisateur :  newUser[key] = value 
//TODO 11: après le parcours des inputs, on va faire un push dans la référence à users (usersRef) dans notre bdd
//TODO 12: Dans la ƒ° addUserBtnClicked, on console log un msg type nouvel utilisateur enregistré 
//TODO 13: Dans la ƒ° addUserBtnClicked, On console log le nom et l’âge du nouvel utilisateur
//TODO 14: Dans la ƒ° addUserBtnClicked, On ré initialise le formulaire avec l’id leFormulaireAjout 


//1
/*
const bouton= document.getElementById("add-user-btn");
console.log(bouton);
//2
bouton.addEventListener("click",  addBtnClicked);
//3
function addBtnClicked (){
    //4
    const usersRef = dbRef.child('users');// viseter les dates

    //5
    let addUserInputsUI=document.getElementsByClassName("user-input");

    //6
    let newUser={};

    //7 pour reemplir chaque valeur contenue dans les imput

    for ( let i = 0 ;  i< addUserInputsUI.lenght; i++ ){
        //8
        let key = addUserInputsUI[i].getAttribute('data-key'); //recuperer les atribute

        //9
        let value = addUserInputsUI[i].value; //pour recuperer les valeurs

        //10

        newUser[key] = value ; //reemplir les newuser 

    }

    usersRef.push(newUser);

    document.getElementById('leformulaireAjout').reset();
   
    

}
*/

const addUserBtnUI = document.getElementById("add-user-btn");
addUserBtnUI.addEventListener("click", addUserBtnClicked);

function addUserBtnClicked() {
    //* on fait une reférence à notre noeud users
    const usersRef = dbRef.child('users');
    //* Ensuite on Récupère les 3 inputs (pour renseigner un nom, un age, un mail)
    const addUserInputsUI = document.getElementsByClassName("user-input");
    console.log(addUserInputsUI);
     //* On crée un objet (vide pour le moment) va stocker les infos du nouvel utilisateur
    let newUser = {};
    //* On fait une boucle pour récupérer les valeurs de chaque input dans le formulaire
    for (let i = 0; i < addUserInputsUI.length; i++) {
    //* Ci dessous on récupère les key et value (on a des attributs data-key déjà placé en html)
        let key = addUserInputsUI[i].getAttribute('data-key');
    //* Pour chaque input on récupère la value.    
        let value = addUserInputsUI[i].value;
    //* Pour chaque CLé (age, name, et email on les associe à notre nouvel utilisateur)
        newUser[key] = value;
    }
    //* Enfin on ajoute notre nouvel utilisateur dans la BDD avec .push()
    usersRef.push(newUser);
    console.log("New User SAVED");
    console.log(`${newUser.name} il a ${newUser.age} ans`);
    //* Pour + de confort on reset le formulaire une fois qu'on a ajouté un user
    document.getElementById('leFormulaireAjout').reset();
}


//* SUPPRIMER
//TODO 1: Dans la ƒ° readUserData, dans le forEach, juste avant $li.innerHtml = …
//TODO 2: Dans la ƒ° readUserData, dans le forEach, On va déclarer une variable deleteIconUI dans laquelle on va créer un élément span
//TODO 3: Dans la ƒ° readUserData, dans le forEach, On va ensuite modifier la class de deleteIconUI en « delete-user »
//TODO 4: Dans la ƒ° readUserData, dans le forEach, On va remplir le innerHTML de deleteIconUI avec un « X » 
//TODO 5: Dans la ƒ° readUserData, dans le forEach, deleteIconUI on lui rajoute un attribut « userid » qui prendra la valeur de key( via setAttribute)
//TODO 6: Dans la ƒ° readUserData, dans le forEach, Enfin sur deleteIconUI on place un addEventListener qui écoute le click et lance la fonction deleteButtonClicked
//TODO 7: Créer une fonction deleteButtonClicked qui prend event en paramètre 
//TODO 8: Dans la ƒ° deleteButtonClicked, récupérer le userID via event.target.getAttribute 
//TODO 9: Dans la ƒ° deleteButtonClicked,Faire une référence userRef à notre BDD directement sur le noeud de l’utilisateur qu’on a cliqué (référence à la table users + userID)
//TODO 10: Dans la ƒ° deleteButtonClicked,utiliser la fonction remove sur userRef


function readUserData(){

}