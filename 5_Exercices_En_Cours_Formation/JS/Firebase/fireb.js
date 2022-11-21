const firebaseConfig = {
    apiKey: "AIzaSyCOXeWF77_KvQo3XsI1MreRLEDWrbIPKWg",
    authDomain: "test-firebase-360d1.firebaseapp.com",
    projectId: "test-firebase-360d1",
    storageBucket: "test-firebase-360d1.appspot.com",
    messagingSenderId: "1070847966270",
    appId: "1:1070847966270:web:5b9fa7280a53f5388f256f",
    measurementId: "G-L9ZKJL4QSL"
  };
    firebase.initializeApp(firebaseConfig);
    //On va créer une référence à notre BDD
    const dbRef = firebase.database().ref(); // quelle reference 
    // On va également faire une ref directement dans le noeud / """"table""""" users
    const usersRef = dbRef.child('users');
    readUserData();


//TODO : Faire setup ensemble
//TODO : Créer une ƒ° readUserData
//TODO : dans cette ƒ° on va stocker la user-list dans une variable userListUI
//TODO : sur la variable usersRef on va utiliser une fonction .on()
//? Pour info .on() va s'utiliser comme un addEventListener
//TODO : 1er param de .on(), une string qui dit "value" (en gros dans la bdd on surveille si ya des changements de value)
//TODO : 2e param de .on(), une ƒ° fléchée qui prend un paramètre snap
//TODO : Dans la fonction fléchée : on va assigner une string vide au innerHTML de userListUI
//TODO : Sur la variable snap on va utiliser un forEach pour parcourir le tableau avec une variable temporaire childSnap
//TODO : Dans le forEach : dans une variable key on va stocker childSnap.key
//TODO : Dans le forEach : dans une variable value on va stocker childSnap.val()
//TODO : Dans le forEach : dans une variable $li on va créer un element <li></li>
//TODO : Dans le forEach : dans le innerHTML de $li on lui assigne value.name
//TODO : Dans le forEach : Sur la $li on lui rajoute un attribut 'user-key', on lui assignera la valeur stockée dans key
//TODO : Dans le forEach : dans la userListUI on va placer $li


function readUserData(){
    const userListUI = document.getElementById("user-list");
    usersRef.on("value", snap =>{
        userListUI.innerHTML = "";
        snap.forEach(childSnap => {
            let key = childSnap.key;
            let value = childSnap.val();
            let $li = document.createElement('li');
            $li.innerHTML = value.name;
            $li.setAttribute('user-key', key);
            userListUI.append($li);
        });
    })
    
};