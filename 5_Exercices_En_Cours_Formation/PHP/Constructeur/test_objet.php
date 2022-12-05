<?php
    require('maison.php');
    //Instance
    $maison = new maison('reve',300,200,2);
    echo '<p>La surface est de '.$maison->getNom().' est égale à '.$maison->surface().'m²</p>';

?>