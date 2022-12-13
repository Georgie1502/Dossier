<?php
    session_start();
    include('utils/connect.php');
    include('manager/manager_category.php');
    include('vue/header.php');

    $message_cat="";

    //Vérifie si l'utilisateur est connecté
    if(isset($_SESSION['connexion'])){
        include('vue/vue_category.php');

        //AJOUT CATEGORY
        if(isset($_POST['name_cat']) and $_POST['name_cat']!="" ) {
            //Récupérérer la donnée à enregistrer en BDD
            $name_cat = $_POST['name_cat'];

            //Créer la category à enregistrer
            $category = new ManagerCategory("",$name_cat);

            //Category va s'ajouter en BDD, et récupération du message de retour
            $message_cat = $category->ajoutCat($bdd);

        } else {
            $message_cat = "Veuillez remplir le formulaire d'ajout.";
        }       


        echo "<h3>Liste des Catégories</h3>
                <form action='' method='post'>";

        //Affichage de la liste des catégories
        //1) Créer l'objet Category pour accéder à sa méthode de Select toutes les Catégories
        //2) Récupérer la liste renvoyer par la BDD, dans $data qui sera un tableau
        //3) Foreach mon tableau $data, pour afficher chaque ligne

        //ETAPE 1 : création de l'objet cat
        $list_category = new ManagerCategory("","");

        //ETAPE 2 : requête Select et récupération de la liste dans $data
        $data = $list_category->afficherCategory($bdd);

        //ETAPE 3 : afficher chaque ligne de $data
        foreach($data as $row){
            echo "<p><input type='checkbox' name='box[]' value='".$row["id_cat"]."'>".$row["name_cat"]."</p>";
        }

        echo "<input type='submit' value='Effacer'></form>";

        if(isset($_POST['box'])){
            $tabCat = $_POST['box'];

            foreach($tabCat as $id_cat){
                $category = new ManagerCategory($id_cat,"");
                $category->deleteCategory($bdd);
            }
            header('Location:http://localhost/Jour%2011/Projet%20Task/category');
        }

    } else {
        echo "<h3>Ajout de Catégorie</h3>
                <p>Veuillez vous connecter pour avoir accès aux catégories.</p>
                <div id='message_cat'></div>";
    }

    include('vue/footer.php');

    echo'<script>
            let message_cat = document.querySelector("#message_cat");
            message_cat.innerHTML="'.$message_cat.'";          
        </script>';
?>