<?php
    //Création de la class Maison 
    class Maison
    {
        //Attributs
        private $nom;
        private $longueur;
        private $largeur;
        private $nbrEtage;
        

        //Constructeur
        public function __construct($nom, $longueur, $largeur ,$nbrEtage){
            $this->nom = $nom;
            $this->longueur = $longueur;
            $this->largeur = $largeur;
            $this->nbrEtage = $nbrEtage;
        }
        //getter et setter
        public function getlongueur(){
            return $this->longueur;
        }

        public function setlongueur($longueur){
            $this->longueur = $longueur;
        }
        public function getnom(){
            return $this->nom;
        }

        public function setnom($nom){
            $this->nom = $nom;
        }

        public function getlargeur(){
            return $this->largeur;
        }

        public function setlargeur($largeur){
            $this->larguer = $largeur;
        }
    
        public function getEtage(){
            return $this->nbrEtage;
        }
    
        public function setEtage($nbrEtage){
            $this->nbrEtage = $nbrEtage;
        }
    
    
        public function surface(){
        echo 'La surface est de: '.$this -> getlongueur()*$this->getlargeur();

        return  $this -> getlongueur()*$this->getlargeur()*($this ->getEtage ()+1);


    }
}