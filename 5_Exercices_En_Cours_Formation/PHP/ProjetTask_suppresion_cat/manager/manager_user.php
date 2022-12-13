<?php
    include('model/model_user.php');

    class ManagerUser extends User{
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

        //Méthode de mise à jour
        public function updateUsers($bdd){
            $id_users = $this->getIdUsers();
            $name_users = $this->getNameUsers();
            $first_name_users = $this->getFirstNameUsers();
            $login_users = $this->getLoginUsers();
            $mdp_users = $this->getMdpUsers();

            try{
                $req=$bdd->prepare('update users set name_users = ?, first_name_users = ?, login_users = ?, mdp_users = ? where id_users = ?');

                $req->bindParam(1,$name_users,PDO::PARAM_STR);
                $req->bindParam(2,$first_name_users,PDO::PARAM_STR);
                $req->bindParam(3,$login_users,PDO::PARAM_STR);
                $req->bindParam(4,$mdp_users,PDO::PARAM_STR);
                $req->bindParam(5,$id_users,PDO::PARAM_INT);

                $req->execute();

                return 'Modification effectuée.';


            }catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }
    }
?>