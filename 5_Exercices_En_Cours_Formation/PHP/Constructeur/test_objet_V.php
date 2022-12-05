<?php
    require('vehicule.php');
    //Instance
    $voiture = new Vehicule('Mercedes CLK',4,250);

    $moto=new Vehicule('Honda CBR',2,280);
    
    $voiture -> detect() ;
    $moto -> detect();

    $voiture -> boost(50);
    $moto -> boost(50);

    $nomVehicule = $voiture->plusRapide($moto);
echo 'le véhicule le plus rapide est : '.$nomVehicule.'.<br>';
?>




  
?>