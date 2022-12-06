<?php
//CONTROLLER
    include('vue/vue_task.php');
    include('utils/connect.php');
    include('model/model_task.php');

    if(isset($_POST['name_user']) and $_POST['name_user']!=""
    and isset($_POST['first_name_user']) and $_POST['first_name_user']!=""
    and isset($_POST['login_user']) and $_POST['login_user']!=""
    and isset($_POST['mdp_user']) and $_POST['mdp_user']!=""){
        $name_user = $_POST['name_user'];
        $first_name_user = $_POST['first_name_user'];
        $login_user = $_POST['login_user'];
        $mdp_user = $_POST['mdp_user'];

        $user= new User ('',$name_user,$first_name_user,$login_user,$mdp_user);
        $message=$user->insertUser($bdd);
        echo $message;
    }
    //création de notre objet user :
    $user= new User ("","","","","");

    //affichageuser ($bdd)
    $data

    foreach($data as $row){
    echo"<p>Utilisateur : ".$row['name_users']." ".$row['first_name_users']." - Login : ".$row['login_users']." </p>";

        //insertUser($bdd,$name_users,$first_name_users,$login_users,$mdp_users);
    }

    //affichageUser($bdd);

    //include('vue/vue_delete.php');

    //listDelete($bdd);

    if(isset($_POST['box']) and $_POST['box'] != ""){
        $tabUsers = $_POST['box'];
        deleteUser($bdd,$tabUsers);
    }

    //include('vue/footer.php');


?>