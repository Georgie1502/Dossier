const elTitro = document.querySelector("h1");
const leCadre = document.querySelector("div");

const hauteurCadre = leCadre.clientHeight;
const largeurCadre = leCadre.clientWidth;

elTitro.style.position = "relative";

let positionTop = 0;//inicialiser sa position 
let positionLeft = 0;
let vitesseVerticale = -2; //
let vitesseHorizontale = -2;//

function monAnim() {

    if(positionTop == 0) { vitesseVerticale *= -1}//pour aller au sens contraire

    else if (positionTop == hauteurCadre - elTitro.offsetHeight)
     {vitesseVerticale *= -1}
     if(positionLeft == 0) { vitesseHorizontale *= -1}//pour aller au sens contraire
    else if (positionLeft == largeurCadre - elTitro.offsetWidth)
     {vitesseHorizontale *= -1}
    positionTop += vitesseVerticale;//acumule de px
    positionLeft += vitesseHorizontale;
    elTitro.style.top = positionTop + "px"; //con faite le deplacement 
    elTitro.style.left = positionLeft + "px";
    requestAnimationFrame(monAnim);//boucle infinie
};
requestAnimationFrame(monAnim); //
