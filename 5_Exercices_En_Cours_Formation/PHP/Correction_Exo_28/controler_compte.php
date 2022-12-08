<?php
    session_start();
    include('vue/header.php');
    include('vue/vue_compte.php');


    //Je test si l'utilisateur est connecté. Si oui : j'affiche ses informations. Si non, j'affiche que personne n'est connecté
    if(isset($_SESSION['connexion'])){
        echo '<p>Login utilisateur : '.$_SESSION['login_utilisateur'].'</p>';
        echo '<p>Id utilisateur : '.$_SESSION['id_utilisateur'].'</p>';
    } else {
        echo "<p>Personne n'est connecté.</p>";
    }

    include('vue/footer.php');

?>