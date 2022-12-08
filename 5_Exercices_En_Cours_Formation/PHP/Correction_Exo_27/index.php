<?php
//CONTROLLER
    include('vue/vue_user.php');
    include('utils/connect.php');
    include('model/model_user.php');
    include('model/model_category.php');
    include('model/model_task.php');

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

    //FORMULAIRE AJOUT CATEGORY
    include('vue/vue_category.php');

    if(isset($_POST['name_cat']) and $_POST['name_cat']!=""){
        //Récupération du nom de la catégorie
        $name_cat = $_POST['name_cat'];

        //Création de mon objet Category
        $category = new Category("",$name_cat);

        //Enregistre en BDD
        $message = $category->ajoutCat($bdd);

        //affichage du message retourner
        echo $message;
    }

    //FORMULAIRE AJOUT TASK
    include('vue/vue_task.php');

    //Récupérer l'id_cat
    //injecter dans la vue une liste déroulante avec des options dont l'attribut Value sera égal à l'id de lacatégorie
    //1) requête pour seclect toutes mes catégories
    $category = new Category("","");
    $data_cat = $category->afficherCategory($bdd);

    //2) Inject le conde grâce à JS dans mon <Select>
    $list_cat = '';
    foreach ($data_cat as $row){
        $list_cat=$list_cat."<option value=".$row['id_cat'].">".$row['name_cat']."</option>";
    }

    if(isset($_POST['nom_task']) and $_POST['nom_task']!=""
    and isset($_POST['content_task']) and $_POST['content_task']!=""
    and isset($_POST['date_task']) and $_POST['date_task']!=""
    and isset($_POST['login_users_task']) and $_POST['login_users_task']!=""
    and isset($_POST['id_cat']) and $_POST['id_cat']!=""){
        //Récupération de mes données
        $nom_task = $_POST['nom_task'];
        $content_task = $_POST['content_task'];
        $date_task = $_POST['date_task'];
        $login_users_task = $_POST['login_users_task'];
        $id_cat = $_POST['id_cat'];

        //Récupérer l'id_users
        $user1 = new User("","","",$login_users_task,"");
        $data = $user1->selectUsersFromLogin($bdd);
        $id_users;
        foreach($data as $row){
            $id_users = $row['id_users'];
        }


        //Création de notre objet task
        $task = new Task("",$nom_task,$content_task,$date_task,$id_users,$id_cat);

        //Enregistrement de la task
        $message = $task->ajoutTask($bdd);

        //Message de confirmation
        echo $message;

    }    

echo'<script>
            let list_users = document.querySelector("#list_users");
            list_users.innerHTML="'.$list_users.'";
            let list_users_checkbox = document.querySelector("#users");
            list_users_checkbox.innerHTML="'.$list_users_checkbox.'";
            let select = document.querySelector("#select_cat");
            select.innerHTML = "'.$list_cat.'";
     </script>';
?>
</body>
</html>