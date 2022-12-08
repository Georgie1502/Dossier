<?php
    class User{
        //ATTRIBUTS
        private $id_user;
        private $name_user;
        private $first_name_user;
        private $login_user;
        private $mdp_user;

        //Constructeur
        public function __construct($id_user,$name_user,$first_name_user,$login_user,$mdp_user){
            $this->id_user = $id_user;
            $this->name_user = $name_user;
            $this->first_name_user = $first_name_user;
            $this->login_user = $login_user;
            $this->mdp_user = $mdp_user;
        }

        //GETTER et SETTER
        public function getNameUser(){
            return $this->name_user;
        }
        public function getIdUser(){
            return $this->id_user;
        }
        public function getFirstNameUser(){
            return $this->first_name_user;
        }
        public function getLoginUser(){
            return $this->login_user;
        }
        public function getMdpUser(){
            return $this->mdp_user;
        }

        public function setIdUser($id_user){
            $this->id_user = $id_user;
        }
        public function setNameUser($name_user){
            $this->name_user = $name_user;
        }
        public function setFirstNameUser($first_name_use){
            $this->first_name_user = $first_name_user;
        }
        public function setLoginUser($login_user){
            $this->login_user = $login_user;
        }
        public function setMdpUser($mdp_user){
            $this->mdp_user = $mdp_user;
        }

        //METHODE
        //Méthode pour enregister un utilisateur en BDD
        public function insertUser($bdd){
            //Récupérer les attributs à enregister
            $name_user = $this->getNameUser();
            $first_name_user = $this->getFirstNameUser();
            $login_user = $this->getLoginUser();
            $mdp_user = $this->getMdpUser();

            try{
                //Requête préparée
                $req = $bdd->prepare('insert into user (name_user, first_name_user, login_user, mdp_user) values(?,?,?,?)');

                //Binding de Paramètre
                $req->bindParam(1,$name_user,PDO::PARAM_STR);
                $req->bindParam(2,$first_name_user,PDO::PARAM_STR);
                $req->bindParam(3,$login_user,PDO::PARAM_STR);
                $req->bindParam(4,$mdp_user,PDO::PARAM_STR);

                //Exécution de la Requête
                $req->execute();

                //Message de validation
                return $name_user.' '.$first_name_user.' a bien été enregistré en BDD.';
            }
            catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }

        //Méthode pour afficher l'ensemble des utilisateurs : renvoie un tableau de l'ensemble de mes utilisateurs
        public function afficherUser($bdd){
            try{
                //Requête préparée
                $req = $bdd->prepare('select * from user');

                //Exécution de la Requête
                $req->execute();

                //stocker la réponse de la BDD
                $data = $req->fetchAll();

                //Message de validation
                return $data;
            }
            catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }

        //Méthode pour supprimer un utilisateur
        public function deleteUser($bdd){
            $id_user = $this->getIdUser();
            try{
                //Requête préparée
                $req = $bdd->prepare('delete from user where id_user = ?');

                //Binding de Paramètre
                $req->bindParam(1,$id_user,PDO::PARAM_INT);

                //Exécution de la Requête
                $req->execute();

                //Message de validation
                return 'Utilisateur supprimé de la BDD';
            }
            catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }
    }
?>