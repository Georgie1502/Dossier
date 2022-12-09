<?php
session_start();
include('../utils/connect.php');
include('../model/model_category.php');
include('../header.php');

if (isset($_SESSION['connexion'])){
    include('vue/vue_category.php');
}else{
    echo '<p>Veuillez vous connecter pour avoir accés
    categorie</p>'
}





//Ajout de categorie
if(isset($_POST['name_cat'])
    and $_POST['name_cat']!=""){
        $name_cat= $_POST['name_cat'];

        $cate = new Category ('',$name_cat);
        $message= $cate ->ajoutCat($bdd);
        echo $message;
}



?>