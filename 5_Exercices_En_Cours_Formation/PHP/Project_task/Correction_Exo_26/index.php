<?php
//CONTROLLER
    include('vue/vue_user.php');
    include('utils/connect.php');
    include('model/model_user.php');

    if(isset($_POST['name_users']) and $_POST['name_users']!=""
    and isset($_POST['first_name_users']) and $_POST['first_name_users']!=""
    and isset($_POST['login_users']) and $_POST['login_users']!=""
    and isset($_POST['mdp_users']) and $_POST['mdp_users']!=""){
        $name_users = $_POST['name_users'];
        $first_name_users = $_POST['first_name_users'];
        $login_users = $_POST['login_users'];
        $mdp_users = $_POST['mdp_users'];

        $user = new User('', $name_users, $first_name_users, $login_users, $mdp_users);
        //var_dump($user);

        $message = $user->insertUser($bdd);
        echo $message;
    }

    //création de notre objet user :
    $user = new User("","","","","");

    //affichageUser($bdd);
    $data = $user->afficherUsers($bdd);
    $list_users='';
    $list_users_checkbox='';
    foreach ($data as $row){
        $list_users=$list_users.'<p>Nom : '.$row['name_users'].' Prénom : '.$row['first_name_users'].' Login : '.$row['login_users'].'.</p>';
        $list_users_checkbox=$list_users_checkbox."<li><input type='checkbox' name='box[]' value='".$row['id_users']."'>Login : ".$row['login_users'].".</li>";

    }


    if(isset($_POST['box']) and $_POST['box'] != ""){
        $tabUsers = $_POST['box'];

        //création de notre objet user :
        $user = new User("","","","","");

        //boucle pour supprimer chaque user coché
        foreach($tabUsers as $row){
            //On passe l'Id à notre User en cours
            $user->setIdUsers($row);
            //appel de la méthode qui supprime un user
            $user->deleteUser($bdd);
        }

        //Message de confirmation
        echo'Les utilisateurs ont été supprimé.';
    }

echo'<script>
            let list_users = document.querySelector("#list_users");
            list_users.innerHTML="'.$list_users.'";
            let list_users_checkbox = document.querySelector("#users");
            list_users_checkbox.innerHTML="'.$list_users_checkbox.'";
     </script>';
?>
</body>
</html>