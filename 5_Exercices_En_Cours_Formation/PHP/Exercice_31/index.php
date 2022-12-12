<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /Jour_9/Demo_routing -> ./controler_accueil.php
    case $path === "/Jour%2011/Exercice_31/" or $path === "/Jour%2011/Exercice_31/accueil":
        include './controller/accueil.php';
        break ;

    case $path === "/Jour%2011/Exercice_31/profil":
        include './controller/profil.php';
        break ;

    case $path === "/Jour%2011/Exercice_31/contact":
        include './controller/contact.php';
        break ;

    default :
        include './controller/404.php';
        break ;

}