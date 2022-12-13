<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /Jour_9/Demo_routing -> ./controler_accueil.php
    case $path === "/Jour%2011/Projet%20Task/" or $path === "/Jour%2011/Projet%20Task/accueil":
        include './controler/accueil.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_compte.php
    case $path === "/Jour%2011/Projet%20Task/category":
        include './controler/category.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_compte.php
    case $path === "/Jour%2011/Projet%20Task/task":
        include './controler/task.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_compte.php
    case $path === "/Jour%2011/Projet%20Task/profil":
        include './controler/profil.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_compte.php
    case $path === "/Jour%2011/Projet%20Task/deconnexion":
        include './controler/deconnexion.php';
        break ;

    //route /Jour_9/Demo_routing -> ./404.php
    default :
        include './controler/404.php' ;
        break ;
}
?>