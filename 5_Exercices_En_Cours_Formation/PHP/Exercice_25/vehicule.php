<?php
class Vehicule{
    //Attributs
    private $nom;
    private $nbrRoue;
    private $vitesse;

    //Constructeur
    public function __construct($nom,$nbrRoue,$vitesse){
        $this->nom = $nom;
        $this->nbrRoue = $nbrRoue;
        $this->vitesse = $vitesse;
    }

    //GETTER et SETTER
    public function getNom(){
        return $this->nom;
    }
    public function getNbrRoue(){
        return $this->nbrRoue;
    }
    public function getVitesse(){
        return $this->vitesse;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setNbrRoue($nbrRoue){
        $this->nbrRoue = $nbrRoue;
    }
    public function setVitesse($vitesse){
        $this->vitesse = $vitesse;
    }

    //METHODES
    public function detect(){
        if($this->getNbrRoue()==2){
            return "une moto";
        } else {
            return "une voiture";
        }
    }

    public function boost($boost){
        $this->setVitesse($this->getVitesse()+$boost);
    }

    public function plusRapide($vehicule){
        if($this->getVitesse() > $vehicule->getVitesse()){
            return $this->getNom();
        } else {
            return $vehicule->getNom();
        }

    }
}
?>