<?php

class Category {
    //Attributs//ex plan d'une maison 
    private $name_cat;
    private $id_cat;
    
    //Constructeur// ex employeur qui va faire la maison
    public function __construct($id_cat,$name_cat){
        $this->$id_cat = $id_cat;
        $this->name_cat = $name_cat;

    //GETTER SETTER
     public function getname_cat(){
        return $this->name_cat;
    }

    public function setname_cat($name_cat){
        $this->name_cat = $name_cat;
    }
    }
}
?>

    <!-- C'est necessarie de faire les id , commme des atributs? -->