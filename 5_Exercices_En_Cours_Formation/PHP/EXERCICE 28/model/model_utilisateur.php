<?php
    class utilisateur{
        //atributs 
        private $id_utilisateur;
        private $login_utilisateur;
        private $mdp_utilisateur;

        //constructeur
        public function __construct($id_utilisateur,$login_utilisateur,$mdp_utilisateur){
            $this->id_utilisateur = $id_utilisateur;
            $this->login_utilisateur = $login_utilisateur;
            $this->mdp_utilisateur=$mdp_utilisateur;
        }

        //GETTER

        public function getIdUti(){
            return $this ->id_utilisateur;
        }
        public function getLoginUti(){
            return $this ->login_utilisateur;
        }

        public function getMdpUti(){
            return $this ->mdp_utilisateur;
        }

        //SETTER

        public function setIdUti($id_utilisateur){
            $this->id_utilisateur = $id_utilisateur;
        }

        public function setLoginUti($login_utilisateur){
            $this->login_utilisateur = $login_utilisateur;
        }

        public function setMdpUti($login_utilisateur){
            $this->mdp_utilisateur = $mdp_utilisateur;
        }

        
        //Méthode pour enregister un utilisateur en BDD
        public function insertUser($bdd){
        //Récupérer les attributs à enregister
        //on lo recupere de la class
        $login_utilisateur = $this->getLoginUti();
        $mdp_utilisateur = $this->getMdpUti();

        try{
            //Requête préparée
            $req = $bdd->prepare('insert into utilisateur (login_utilisateur,mdp_utilisateur) values(?,?)');

            //Binding de Paramètre
            $req->bindParam(1,$login_utilisateur,PDO::PARAM_STR);
            $req->bindParam(2,$mdp_utilisateur,PDO::PARAM_STR);
            

            //Exécution de la Requête
            $req->execute();

            //Message de validation
            return $login_utilisateur.' a bien été enregistré en BDD.';
            }
            catch(Exception $error){
            die('Error :'.$error->getMessage());
            }
            }   
        }