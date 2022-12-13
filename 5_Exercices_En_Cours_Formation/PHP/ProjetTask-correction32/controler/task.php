<?php
    session_start();
    include('utils/connect.php');
    include('model/model_task.php');
    include('model/model_category.php');
    include('vue/header.php');

        if(isset($_SESSION['connexion'])){
            include('vue/vue_task.php');
            $message_task="";
            //AJOUT TASK
            //1) Insérer la liste des catégorie dans mon input SELECT
            //A) Création de l'objet catégorie pour récupérer la liste
            $list_cat = new Category("","");

            //B) Faire la requête SELECT toute la liste des catégories, et la récupérer dans $data qui est un tableau
            $data = $list_cat->afficherCategory($bdd);

            //C) Créer la variable $select_cat pour y mettre le code à insérer en JS
            $select_cat="";

            //D) Boucle Foreach sur $data pour insérer chaque option de category dans select_cat
            foreach($data as $row){
                $select_cat = $select_cat."<option value='".$row['id_cat']."'>".$row['name_cat']."</option>";
            }

            //E) Injection du Select_cat dans le Select du formulaire grâce à JS (code après le footer)
            echo'<script>
                    let select_cat = document.querySelector("#select_cat");
                    select_cat.innerHTML="'.$select_cat.'";           
                </script>';

            //2) AJOUTER LA TASK
            if(isset($_POST['nom_task']) and $_POST['nom_task']!=""
            and isset($_POST['content_task']) and $_POST['content_task']!=""
            and isset($_POST['date_task']) and $_POST['date_task']!=""
            and isset($_POST['id_cat']) and $_POST['id_cat']!=""){
                    //Récupérer les données à enregistrer
                    $nom_task = $_POST['nom_task'];
                    $content_task = $_POST['content_task'];
                    $date_task = $_POST['date_task'];
                    $id_cat = $_POST['id_cat'];
                    $id_users = $_SESSION['id_users'];

                    //Crée ma task qui va s'enregistrer en BDD
                    $task = new Task("",$nom_task,$content_task,$date_task,$id_users,$id_cat);

                    //Requête d'enregistrement et récupération de la réponse de la BDD dans $message
                    $message_task = $task->ajoutTask($bdd);

            }else{
                $message_task =  'Veuillez remplir le formulaire';
            }

            //echo de message_task
            echo'<script>
                    let message_task = document.querySelector("#message_task");
                    message_task.innerHTML="'.$message_task.'";            
                </script>';



            //AFFICHAGE DE MES TASK
            //1) Créer la task à afficher
            //2) Requête pour avoir l'ensemble des task et récupération de la réponse dans $data qui est un tableau
            //3) Foreach sur $data pour afficher chaque ligne

            echo "<h3>Liste des Tasks</h3><ul>";

            //ETAPE 1 : création de l'objet task
            $list_task= new Task("","","","",$_SESSION['id_users'],"");

            //ETAPE 2 : requête Select et récupération de la liste dans $data
            $data = $list_task->afficherTask($bdd);

            //ETAPE 3 : afficher chaque ligne de $data
            foreach($data as $row){
                echo "<li>".$row["nom_task"]." : ".$row["content_task"]." - DATE : ".$row["date_task"]."</li>";
            }

            echo "</ul>";


        }else{
            echo '<p>Veuillez vous connecter pour avoir accès aux Task.</p>';
        }

    include('vue/footer.php');

    //AJOUT TASK

    //Récupérer l'id_cat
    //injecter dans la vue une liste déroulante avec des options dont l'attribut Value sera égal à l'id de lacatégorie
    //1) requête pour seclect toutes mes catégories
   /* $category = new Category("","");
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

    }*/
?>