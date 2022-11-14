class Imc {
    constructor(unNom,unPoid,uneTaille){
        this._nom=unNom;
        this._poid=unPoid;
        this._taille=uneTaille;
        this._imc= this.calculIml();
    }
    calculIml(){
        this._nom=nom;

    }
    display(){
        console.log(unNom,unPoid,uneTaille,Imc );

    }
};

function calculIml(){
    retour 
}

//* progr principal -> injection des données
const list = [
    new Imc("Sébastien Chabal",135, 1.70),
    new Imc("Escaladeuse Ultra Svelte", 45, 1.68),
    new Imc("JOJO ", 300, 2),
    ];
//*Boucle forEach qui parcourt le tableau avec une variable temporaire uneCase
list.forEach(uneCase => uneCase.display());