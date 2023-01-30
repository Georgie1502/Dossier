<?php
    class Category{
        //ATTRIBUTS
        private $id_cat;
        private $name_cat;

        //Constructeur
        public function __construct($id_cat,$name_cat){
            $this->id_cat = $id_cat;
            $this->name_cat = $name_cat;
        }
    }

?>