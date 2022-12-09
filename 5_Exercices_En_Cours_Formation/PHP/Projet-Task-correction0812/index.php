<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /Jour_9/Demo_routing -> ./accueil.php
    case $path === "/Projet-Task-correction0812/" or $path === "/Projet-Task-correction0812/accueil":
        include('controleur/accueil.php');
        break ;

    //route /Jour_9/Projet-Task-correction0812 -> ./profil.php
    case $path === "/Projet-Task-correction0812/profil":
        include('controleur/profil.php');
        break ;

    //route /Jour_9/Projet-Task-correction0812 -> ./deconnexion.php
    case $path === "/Projet-Task-correction0812/deconnexion":
        include('controleur/deconnexion.php') ;
        break ;

    //route /PHP/Projet-Task-correction0812 -> ./404.php
    default :
        include('./controleur/404.php') ;
        break ;
}
?>