<!--
    UN FICHIER UTILITAIRE
    -> Contient mon objet de connexion à la BDD
-->

<!-- CODE :Connexion à la BDD -->

<?php
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>