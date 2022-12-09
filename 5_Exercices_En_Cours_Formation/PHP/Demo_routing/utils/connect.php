<?php
    //Utilitaire de connexion
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateur','root','root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>