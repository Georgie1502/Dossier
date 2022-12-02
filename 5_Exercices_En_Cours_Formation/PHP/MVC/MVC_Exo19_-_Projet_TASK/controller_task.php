<?php
//CONTROLLER
    include('vue/vue_task.php');
    include('utils/connect.php');
    include('model/model_task.php');

    if(isset($_POST['name_users']) and $_POST['name_users']!=""
    and isset($_POST['first_name_users']) and $_POST['first_name_users']!=""
    and isset($_POST['login_users']) and $_POST['login_users']!=""
    and isset($_POST['mdp_users']) and $_POST['mdp_users']!=""){
        $name_users = $_POST['name_users'];
        $first_name_users = $_POST['first_name_users'];
        $login_users = $_POST['login_users'];
        $mdp_users = $_POST['mdp_users'];

        insertUser($bdd,$name_users,$first_name_users,$login_users,$mdp_users);
    }

    affichageUser($bdd);

    include('vue/vue_delete.php');

    listDelete($bdd);

    if(isset($_POST['box']) and $_POST['box'] != ""){
        $tabUsers = $_POST['box'];
        deleteUser($bdd,$tabUsers);
    }

    include('vue/footer.php');


?>