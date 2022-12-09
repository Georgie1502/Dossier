<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /Jour_9/Demo_routing -> ./controler_accueil.php
    case $path === "/Jour_9/Demo_routing/" or $path === "/Jour_9/Demo_routing/controler_accueil":
        include './controler/controler_accueil.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_compte.php
    case $path === "/Jour_9/Demo_routing/controler_compte":
        include './controler/controler_compte.php';
        break ;

    //route /Jour_9/Demo_routing -> ./controler_deconnexion.php
    case $path === "/Jour_9/Demo_routing/controler_deconnexion":
        include './controler/controler_deconnexion.php' ;
        break ;

    //route /Jour_9/Demo_routing -> ./404.php
    default :
        include './controler/404.php' ;
        break ;
}
?>