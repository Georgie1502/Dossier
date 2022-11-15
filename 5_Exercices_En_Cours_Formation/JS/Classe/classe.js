/*class Imc {
    //* Constructor -> initialise les données
    constructor(nom, poids, taille) {
      this._nom = nom;        //! 3 attributes en In mode
      this._poids = poids;
      this._taille = taille;
      this._imc = this.calculImc();    //! attribute en OUT mode (à calculer)
    }
      //* Le calcul
    calculImc() {    //* Format simple (2 nombres après le . ou la ,)
      // return this._poids/(this._taille*this._taille);
      //  return (this._poids/Math.pow(this._taille, 2)).toFixed(2);
      return (this._poids/(this._taille ** 2)).toFixed(2);
    }
      //* Affichage
    display() {
      console.log
      (this._nom + " (" + this._poids + " kg, " + this._taille + " M) a un IMC de: " + this._imc);
    }
  }
  


//* progr principal -> injection des données
const list = [
    new Imc("Sébastien Chabal",135, 1.70),
    new Imc("Escaladeuse Ultra Svelte", 45, 1.68),
    new Imc("JOJO ", 300, 2),
    ];
//*Boucle forEach qui parcourt le tableau avec une variable temporaire uneCase
list.forEach(uneCase => uneCase.display());*/


//**************************************************************************************************************************** */

///this is the info qui rentre du constructor
/*
class Employee {
    constructor(Unnom,prenom,age,salaireM){
      this._nom = Unnom;       
      this._prenom = prenom;
      this._age = age;
      this.salaireM= salaireM
      this._cout = this.calculCout();// Calcul cout annuel de l'employé :attribut en outMode

    }

// me servira à passer le cout d 1 employé dans la classe PME
// Comme ça quand dans la classe PME je vais utiliser des objet Employee, cette fonction facilitera les choses
// Pour retrouver le cout total d'un employee sur un an
  getCout() {//bouble pour savoir combien est le cout du employer
    return this._cout;
}

//calcul cout total d 1 salarié
calculCout() {    
// ON va calculer le cout total d'un emplyé sur 1 an
  

  return (this.salaireM*12*1+0,9);
}


class Pme {
    constructor(nom,EquipesS,FraisF,FraisA,Revenue){
      this._nom = nom;        
      this._EquipeS =EquipeS;
      this._FraisF = FraisF;
      this._FraisA= FraisA;
      this._Revenue=Revenue;
      

    }
}

Bilan()
{
    return (this._Revenue-(this._FraisF+this_FraisA+this_EquipeS));
}
console.log(Bilan)


list.forEach(Employee => uneCase.display())

*/


//! ----------------------EXO CLASS PME----------------------



class Employee {
  constructor(nom, prenom, age, salaireMensuel) {
    this._nom = nom;    
    this._prenom = prenom;
    this._age = age;
    this._salaireMensuel = salaireMensuel;
    this._cout = this.calculCout();// Calcul cout annuel de l'employé :attribut en outMode
  }
// me servira à passer le cout d 1 employé dans la classe PME
  getCout() {
      return this._cout;
  }
//calcul cout total d 1 salarié
  calculCout() {    
    const NB_MOIS_SAL = 12; 
    const LA_TAXE = 0.9;     
    //Un léger calcul
    return this._salaireMensuel * NB_MOIS_SAL * (1 + LA_TAXE);
  }
}

class Pme {
  constructor(nom, equipe, ventes, coutsFixes, achats) {
      this._nom = nom;
      this._equipe = equipe;
      this._cout = coutsFixes + achats;// On peut assigner directement un calcul ici
      this._ventes = ventes;
      this._bilan = 0;    // attribut en OutMode a calculer
  }

  bilanCalculed () {        
    let cumulEquipe = 0;
    console.log(`${this._nom} : Cout Initial : ${this._cout}`);

//Boucle qui parcourt le tableau des salariés (equipe)
//Sur chaque salarié parcouru dans le tableau, on récupère et cumule le cout de ce Salarié
    for (let unSalarie of this._equipe){ 
          cumulEquipe += unSalarie.getCout();
        }

    console.log(`${this._nom} : Cout Total Equipe : ${cumulEquipe}`);
  //Ensuite dans les couts de l'entreprise on cumul le cout de toute l'équipe
    this._cout += cumulEquipe;
    console.log(`${this._nom} : VENTES : ${this._ventes}`);
//Dans les _cout on va avoir les frais fixe + frais achat et 
//on vient de rajouter en + le cout total d'une equipe
//donc le bilan de la pme : les ventes moins tous les couts (frais fixes, achat + cout total de l'equipe à l'année)
    this._bilan = this._ventes - this._cout;
    console.log(`${this._nom} : BILAN : ${this._bilan}`);
  }
}
    

// Scénario
const pme = new Pme (
    //Le nom entreprise
      "Ma Petite Entreprise - ", 
      //L'equipe de salariés (un tableau)
      [new Employee ("Duval", "Paul", 30, 2000),
      new Employee ("Durand", "Alain", 40, 3000),
      new Employee ("Dois", "Sylvia", 50, 4000),],
       //le revenu , frais fixe, frais d'achat
      300000,
      20000,
      50000);
  pme.bilanCalculed();

///*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*REGEX/*/*/*/*/*/**/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/* */


  let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
let testEmails = ["notanemail.com", "workingexample@email.com", "another_working@somethingelse.org", "notworking@1.com"];

testEmails.forEach((address) => {
    console.log(regex.test(address))
});