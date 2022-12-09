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
        public function getNameUsers(){
            return $this->name_users;
        }
        public function getIdUsers(){
            return $this->id_users;
        }
        public function getFirstNameUsers(){
            return $this->first_name_users;
        }
        public function getLoginUsers(){
            return $this->login_users;
        }
        public function getMdpUsers(){
            return $this->mdp_users;
        }

        public function setIdUsers($id_users){
            $this->id_users = $id_users;
        }
        public function setNameUsers($name_users){
            $this->name_users = $name_users;
        }
        public function setFirstNameUsers($first_name_users){
            $this->first_name_users = $first_name_users;
        }
        public function setLoginUsers($login_users){
            $this->login_users = $login_users;
        }
        public function setMdpUsers($mdp_users){
            $this->mdp_users = $mdp_users;
        }

        //METHODE
        //Méthode pour enregister un utilisateur en BDD
        public function insertUser($bdd){
            //Récupérer les attributs à enregister
            $name_users = $this->getNameUsers();
            $first_name_users = $this->getFirstNameUsers();
            $login_users = $this->getLoginUsers();
            $mdp_users = $this->getMdpUsers();

            try{
                //Requête préparée
                $req = $bdd->prepare('insert into users (name_users, first_name_users, login_users, mdp_users) values(?,?,?,?)');

                //Binding de Paramètre
                $req->bindParam(1,$name_users,PDO::PARAM_STR);
                $req->bindParam(2,$first_name_users,PDO::PARAM_STR);
                $req->bindParam(3,$login_users,PDO::PARAM_STR);
                $req->bindParam(4,$mdp_users,PDO::PARAM_STR);

                //Exécution de la Requête
                $req->execute();

                //Message de validation
                return $name_users.' '.$first_name_users.' a bien été enregistré en BDD.';
            }
            catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }

        //Méthode pour afficher l'ensemble des utilisateurs : renvoie un tableau de l'ensemble de mes utilisateurs
        public function afficherUsers($bdd){
            try{
                //Requête préparée
                $req = $bdd->prepare('select * from users');

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

        //Méthode pour sélectionner un utilisateur à partir de son Login
        public function selectUsersFromLogin($bdd){
            $login_users = $this->getLoginUsers();
            try{
                //Requête préparée
                $req = $bdd->prepare('select * from users where login_users = ?');

                //Binding de Paramètre
                $req->bindParam(1,$login_users,PDO::PARAM_STR);

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
            $id_users = $this->getIdUsers();
            try{
                //Requête préparée
                $req = $bdd->prepare('delete from users where id_users = ?');

                //Binding de Paramètre
                $req->bindParam(1,$id_users,PDO::PARAM_INT);

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