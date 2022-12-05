<?php
    class Vehicule
    {
        //Attributs
        private $nomVehicule;
        private $nbrRoue;
        private $vitesse;

        //Constructeur
        function __construct($nomVehicule, $nbrRoue, $vitesse){
            $this->nomVehicule = $nomVehicule;
            $this->nbrRoue = $nbrRoue;
            $this->vitesse = $vitesse;
        }

        //Méthode
        //GETTER et SETTER
        public function getNomVehicule(){
            return $this->nomVehicule;
        }

        public function setNomVehicule($nom){
            $this->nomVehicule = $nom;
        }

        public function getNbrRoue(){
            return $this->nbrRoue;
        }

        public function setNbrRoue($nombre){
            $this->nbrRoue = $nombre;
        }

        public function getVitesse(){
            return $this->vitesse;
        }

        public function setVitesse($vitesse){
            $this->vitesse = $vitesse;
        }
    }
    
?>