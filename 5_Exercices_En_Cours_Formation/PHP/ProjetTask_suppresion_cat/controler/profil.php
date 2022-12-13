<?php
    session_start();
    include('utils/connect.php');
    include('manager/manager_user.php');
    include('vue/header.php');
    include('vue/vue_profil.php');

    //Vérifie si l'utilisateur est connecté
    if(isset($_SESSION['connexion'])){
        echo "<form action='' method='post'>
                <p>Nom : <input type='text' name='name_users' value='".$_SESSION['name_users']."'required></p>
                <p>Prénom : <input type='text' name='first_name_users' value='".$_SESSION['first_name_users']."'required></p>
                <p>Login : <input type='text' name='login_users' value='".$_SESSION['login_users']."'required></p>
                <input type='submit' value='Modifier le profil'>
              </form>";

        if(isset($_POST['name_users']) and !empty($_POST['name_users'])
        and isset($_POST['first_name_users']) and !empty($_POST['first_name_users'])
        and isset($_POST['login_users']) and !empty($_POST['login_users'])){
            $name_users = $_POST['name_users'];
            $first_name_users = $_POST['first_name_users'];
            $login_users = $_POST['login_users'];

            $user = new ManagerUser($_SESSION['id_users'],$name_users,$first_name_users,$login_users,$_SESSION['mdp_users']);

            $message = $user->updateUsers($bdd);

            echo $message;

            $_SESSION['name_users'] = $name_users;
            $_SESSION['first_name_users'] = $first_name_users;
            $_SESSION['login_users'] = $login_users;

            header('Location:http://localhost/Jour%2011/Projet%20Task/profil');

        }
    } else {
        echo "<p>Personne n'est connecté.</p>";
    }

    include('vue/footer.php');
?>