<?php
    //Connexion à la BDD
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateur','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>