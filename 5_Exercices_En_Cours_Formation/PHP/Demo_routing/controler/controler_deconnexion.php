<?php
    session_start();
    include('vue/header.php');
    include('vue/vue_deconnexion.php');
    include('vue/footer.php');
    session_destroy();
?>