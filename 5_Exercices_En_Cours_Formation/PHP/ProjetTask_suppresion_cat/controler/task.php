<?php
    session_start();
    include('utils/connect.php');
    include('manager/manager_task.php');
    include('manager/manager_category.php');
    include('vue/header.php');

        if(isset($_SESSION['connexion'])){
            include('vue/vue_task.php');
            $message_task="";
            //AJOUT TASK
            //1) Insérer la liste des catégorie dans mon input SELECT
            //A) Création de l'objet catégorie pour récupérer la liste
            $list_cat = new ManagerCategory("","");

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
                    $task = new ManagerTask("",$nom_task,$content_task,$date_task,$id_users,$id_cat);

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

            echo "<h3>Liste des Tasks</h3><form action='' method='post'>";

            //ETAPE 1 : création de l'objet task
            $list_task= new ManagerTask("","","","",$_SESSION['id_users'],"");

            //ETAPE 2 : requête Select et récupération de la liste dans $data
            $data = $list_task->afficherTask($bdd);

            //ETAPE 3 : afficher chaque ligne de $data
            foreach($data as $row){
                echo "<p><input type='checkbox' name='box[]' value='".$row["id_task"]."'>".$row["nom_task"]." : ".$row["content_task"]." - DATE : ".$row["date_task"]."</p>";
            }

            echo "<input type='submit' value='Supprimer'></form>";

            if(isset($_POST['box'])){
                $tabTask = $_POST['box'];
    
                foreach($tabTask as $id_task){
                    $task = new ManagerTask($id_task,"","","","","");
                    $task->deleteTask($bdd);
                }
                header('Location:http://localhost/Jour%2011/Projet%20Task/task');
            }


        }else{
            echo '<p>Veuillez vous connecter pour avoir accès aux Task.</p>';
        }

    include('vue/footer.php');
?>