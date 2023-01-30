<?php
    class Task{
        //ATTRIBUTS
        private $id_task;
        private $nom_task;
        private $content_task;
        private $date_task;
        private $id_users;
        private $id_cat;

        //Constructeur
        public function __construct($id_task,$nom_task,$content_task,$date_task,$id_users,$id_cat){
            $this->id_task = $id_task;
            $this->nom_task = $nom_task;
            $this->content_task = $content_task;
            $this->date_task = $date_task;
            $this->id_users = $id_users;
            $this->id_cat = $id_cat;
        }
    }
?>