<?php
session_start();
include('header.php');
include('vue/vue_deconnexion.php');
if($_SESSION['connexion']){
    echo"<p>".$_SESSION['login_users']."est bien déconnecté.";
}else{
    echo "<p> Personne à déconnecter.</p>";
}

include ('vue/footer.php');
session_destroy();

?>