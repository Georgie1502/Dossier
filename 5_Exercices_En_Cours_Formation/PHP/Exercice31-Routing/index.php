<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /Exercice31-Routing -> ./accueil.php
    case $path === "/Exercice31-Routing/" or $path === "/Exercice31-Routing/accueil":
        include('controller/accueil.php');
        break ;

    //route /Exercice31-Routing -> ./profil.php
    case $path === "/Exercice31-Routing/profil":
        include('controller/profil.php');
        break ;

    //route /Jour_9/Exercice31-Routing -> ./contact.php
    case $path === "/Exercice31-Routing/contact":
        include('controller/contact.php') ;
        break ;

    //route /PHP/Exercice31-Routing -> ./404.php
    default :
        include('./controller/404.php') ;
        break ;
}
?>