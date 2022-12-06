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

        //GETTER SETTER
        public function getname_cat(){
        return $this->name_cat;
        }

        public function getid_cat(){
            return $this->id_cat;
        }

        public function setname_cat($name_cat){
        $this->name_cat = $name_cat;
        }

        public function setid_cat($id_cat){
        id$this->id_cat = $id_cat;
        }
    }
    

?>