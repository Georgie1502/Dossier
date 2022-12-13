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

        //GETTER et SETTER
        protected function getIdCat(){
            return $this->id_cat;
        }
        protected function getNameCat(){
            return $this->name_cat;
        }

        protected function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }
        protected function setNameCat($name_cat){
            $this->name_cat = $name_cat;
        }
        
    }

?>