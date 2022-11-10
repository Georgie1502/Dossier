const elTitro = document.querySelector("h1");
const leCadre = document.querySelector("div");

const hauteurCadre = leCadre.clientHeight;
const largeurCadre = leCadre.clientWidth;

elTitro.style.position = "relative";

let positionTop = 0;
let positionLeft = 0;
let vitesseVerticale = -2;
let vitesseHorizontale = -2;

function monAnim() {
    
    if(positionTop == 0) { vitesseVerticale *= -1}
    else if (positionTop == hauteurCadre - elTitro.offsetHeight)
     {vitesseVerticale *= -1}
     if(positionLeft == 0) { vitesseHorizontale *= -1}
    else if (positionLeft == largeurCadre - elTitro.offsetWidth)
     {vitesseHorizontale *= -1}
    positionTop += vitesseVerticale;
    positionLeft += vitesseHorizontale;
    elTitro.style.top = positionTop + "px";
    elTitro.style.left = positionLeft + "px";
    requestAnimationFrame(monAnim);
};
requestAnimationFrame(monAnim);
