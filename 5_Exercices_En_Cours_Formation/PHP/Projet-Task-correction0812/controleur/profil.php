<?php
    session_start();
    include('vue/header.php');
    include('vue/vue_profil.php');

    //Vérifie si l'utilisateur est connecté
    if(isset($_SESSION['connexion'])){
        echo "<ul>
                <li>Nom : ".$_SESSION['name_users']."</li>
                <li>Prénom : ".$_SESSION['first_name_users']."</li>
                <li>Login : ".$_SESSION['login_users']."</li>
              </ul>";
    } else {
        echo "<p>Personne n'est connecté.</p>";
    }

    include('vue/footer.php');
?>