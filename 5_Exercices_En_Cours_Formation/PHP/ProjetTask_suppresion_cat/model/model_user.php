<?php
    class User{
        //ATTRIBUTS
        private $id_users;
        private $name_users;
        private $first_name_users;
        private $login_users;
        private $mdp_users;

        //Constructeur
        public function __construct($id_users,$name_users,$first_name_users,$login_users,$mdp_users){
            $this->id_users = $id_users;
            $this->name_users = $name_users;
            $this->first_name_users = $first_name_users;
            $this->login_users = $login_users;
            $this->mdp_users = $mdp_users;
        }

        //GETTER et SETTER
        protected function getNameUsers(){
            return $this->name_users;
        }
        protected function getIdUsers(){
            return $this->id_users;
        }
        protected function getFirstNameUsers(){
            return $this->first_name_users;
        }
        protected function getLoginUsers(){
            return $this->login_users;
        }
        protected function getMdpUsers(){
            return $this->mdp_users;
        }

        protected function setIdUsers($id_users){
            $this->id_users = $id_users;
        }
        protected function setNameUsers($name_users){
            $this->name_users = $name_users;
        }
        protected function setFirstNameUsers($first_name_users){
            $this->first_name_users = $first_name_users;
        }
        protected function setLoginUsers($login_users){
            $this->login_users = $login_users;
        }
        protected function setMdpUsers($mdp_users){
            $this->mdp_users = $mdp_users;
        }
    }
?>