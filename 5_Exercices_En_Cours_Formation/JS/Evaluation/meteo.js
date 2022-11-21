let d=document.div
let newdiv= document.createElement('div');
d.appendChild(newdiv,);

let info = document.querySelector('div');
function addInfo(){
    info.textContent="";

}

const btt=document.querySelector("button");
console.log(btt);



function bouton(btt){
    const nexclass = document.createElement("class");
    nexclass.innerHTML="button__cardMeteo";
    document.body.appendChild(nexclass);
    btt.addEventListener('mousedown', ()=>{
    btt.style.backgroundColor = "orange"}
    
    );
    btt.addEventListener('mouseup',()=>{
        btt.style.backgroundColor = "blue"

    }

    );
    
    btt.addEventListener('clik',()=>{
        const meteoApiContac = async () =>{
        const meteoData= await fetch('https://prevision-meteo.ch/services/json/toulouse');
        const meteoTransf= await meteoData.json();

        });

    }




    


