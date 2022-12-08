<?php
//CONTROLLER
    include('vue/vue_user.php');
    include('utils/connect.php');
    include('model/model_user.php');

    if(isset($_POST['name_user']) and $_POST['name_user']!=""
    and isset($_POST['first_name_user']) and $_POST['first_name_user']!=""
    and isset($_POST['login_user']) and $_POST['login_user']!=""
    and isset($_POST['mdp_user']) and $_POST['mdp_user']!=""){
        $name_user = $_POST['name_user'];
        $first_name_user = $_POST['first_name_user'];
        $login_user = $_POST['login_user'];
        $mdp_user = $_POST['mdp_user'];

        $user = new User('', $name_user, $first_name_user, $login_user, $mdp_user);
        //var_dump($user);

        $message = $user->insertUser($bdd);
        echo $message;
    }

    //création de notre objet user :
    $user = new User("","","","","");

    //affichageUser($bdd);
    $data = $user->afficherUser($bdd);
    $list_users='';
    $list_users_checkbox='';
    foreach ($data as $row){
        $list_users=$list_users.'<p>Nom : '.$row['name_user'].' Prénom : '.$row['first_name_user'].' Login : '.$row['login_user'].'.</p>';
        $list_users_checkbox=$list_users_checkbox."<li><input type='checkbox' name='box[]' value='".$row['id_user']."'>Login : ".$row['login_user'].".</li>";

    }


    if(isset($_POST['box']) and $_POST['box'] != ""){
        $tabUsers = $_POST['box'];

        //création de notre objet user :
        $user = new User("","","","","");

        //boucle pour supprimer chaque user coché
        foreach($tabUsers as $row){
            //On passe l'Id à notre User en cours
            $user->setIdUser($row);
            //appel de la méthode qui supprime un user
            $user->deleteUser($bdd);
        }

        //Message de confirmation
        echo'Les utilisateurs ont été supprimé.';
    }

echo'<script>
            let list_users = document.querySelector("#list_users");
            list_users.innerHTML="'.$list_users.'";
            let list_users_checkbox = document.querySelector("#user");
            list_users_checkbox.innerHTML="'.$list_users_checkbox.'";
     </script>';
?>
</body>
</html>