<?php

//intitaliser la connection à la BDD
                $bdd = new PDO('mysql:host=localhost;dbname=compte','root','',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>