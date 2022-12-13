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

        //GETTER et SETTER
        protected function getIdTask(){
            return $this->id_task;
        }
        protected function getNomTask(){
            return $this->nom_task;
        }
        protected function getContentTask(){
            return $this->content_task;
        }
        protected function getDateTask(){
            return $this->date_task;
        }
        protected function getIdUsers(){
            return $this->id_users;
        }
        protected function getIdCat(){
            return $this->id_cat;
        }

        protected function setIdTask($id_task){
            $this->id_task = $id_task;
        }
        protected function setNomTask($nom_task){
            $this->$nom_task = $$nom_task;
        }
        protected function setContentTask($content_task){
            $this->content_task = $content_task;
        }
        protected function setDateTask($date_task){
            $this->date_task = $date_task;
        }
        protected function setIdUsers($id_users){
            $this->id_users = $id_users;
        }
        protected function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }

    
    }
?>