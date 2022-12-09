<?php
session_start();
include('../header.php');
include('../vue/vue_compte.php');

//Vérifie si l'utilisateur est connecté

if (isset($_SESSION['connexion'])){
    echo "<ul>
            <li>Nom:.".$_SESSION['name_users']
    "
}