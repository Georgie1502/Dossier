/*let nomPokemon = document.getElementById('nom');
console.log(nomPokemon);

//2-1

const majCounter= async ()=>{
    const data= await fetch("https://api.countapi.xyz/hit/hola/visitas"); 
    console.log(data);
    

    const dataTransformed = await data.json();
    console.log(dataTransformed);
    counter.innerHTML=dataTransformed.value;
    counter.style.filter='blur(0)';
}
*/
const pokemonListe = document.getElementById('pokeListe');
//de base une ƒ° => est anonyme, astuce pour désanonymiser, on la stocke dans une variable
const pokemonApiContact = async () => {
    //Data va récup Toutes les données de l'api
    const pokemonData = await fetch('https://pokeapi.co/api/v2/pokemon');
    console.log(pokemonData);
    //Plutot que de Travailler sur la réponse, on va la transformé pour 
    //qu'elle deviennt un OBJET JS (+ pratique)
    const pokemonDataTransformed = await pokemonData.json();
    console.log(pokemonDataTransformed);

    console.log(pokemonDataTransformed.results[0].name);
    for(let i=0;i<pokemonDataTransformed.results.length;i++){
        let listElement = document.createElement('li');
        listElement.innerText = pokemonDataTransformed.results[i].name;
        pokemonListe.append(listElement);
    }

    const pokemonName = document.createElement('h1');
    pokemonName.innerText = pokemonDataTransformed.results[0].name;
    document.body.append(pokemonName);


};
pokemonApiContact();


/*EXO Algo JS 
- on a une variable maCarte qui contient 'magmar'
- on a une variable taCarte qui contient 'ronflex'

Trouver un moyen de faire un échange de carte 
à la fin il faut que dans maCarte j'ai 'ronflex' et que  que dans taCarte j'ai 'magmar'*/

