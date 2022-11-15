// TODO : Une page html avec un formulaire de connexion (login et mot de passe)
// TODO : faire un programme JS qui va vérifier la saisi du login et mot de passe

// TODO : Le login doit être au format mail (doit contenir un @ et un . )

// TODO : Le MDP doit contenir : (entre 6 et 8 caractères) (1 caractère spécial minimum) (1 chiffre)

// TODO : Si le login n’est pas bon l'input est rouge sinon il est en vert

// TODO : Si le MDP n’est pas valide on affiche une explication en rouge (si MDP trop long, trop court ne contient pas de chiffres, 
//ne contient pas de caractère spécial)

// TODO : Si le MDP est valide on affiche un message en vert "Mot de passe valide"


const login= document.getElementById('login');
console.log(login);
login.addEventListener('keyup',()=>{
    let regex = new RegExp('@+\.');
    let testEmails=[
        "bonnanotte@hotmail.com"];
    
        testEmails.forEach((address)=>{
            console.log(regex.test(address))
        })

 if (testEmails.value=true){
    login.type.color="red"
  } else {
        login.type.color="green"
            
        }

    }

 
);

const MDP= document.getElementById('password');
console.log(MDP);

MDP.addEventListener('keyup',()=>{
    let carDecimal = /\d/;

    let carSpeciaux = /[$&@!?*]/;

    
}

if (MDP.value<6 ) {
    else{

    }
}
 
);


/*let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
let testEmails = ["notanemail.com", "workingexample@email.com", "another_working@somethingelse.org", "notworking@1.com"];

testEmails.forEach((address) => {
    console.log(regex.test(address))
});*/