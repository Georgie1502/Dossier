<?php
include('model/model_task.php');
class ManagerTask extends Task {
    //METHODE
        //méthode pour enregister une task
        public function ajoutTask($bdd){
            //récupération des données à enregistrer
            $nom_task = $this->getNomTask();
            $content_task = $this->getContentTask();
            $date_task = $this->getDateTask();
            $id_users = $this->getIdUsers();
            $id_cat = $this->getIdCat();

            try{
                //Requête préparée
                $req = $bdd->prepare('insert into task (nom_task,content_task,date_task,id_users,id_cat ) values (?,?,?,?,?)');

                //Binding de Param
                $req->bindParam(1,$nom_task,PDO::PARAM_STR);
                $req->bindParam(2,$content_task,PDO::PARAM_STR);
                $req->bindParam(3,$date_task,PDO::PARAM_STR);
                $req->bindParam(4,$id_users,PDO::PARAM_INT);
                $req->bindParam(5,$id_cat,PDO::PARAM_INT);

                //Exécuter la requête
                $req->execute();

                //Retourner un message de confirmation
                return 'La task : '.$nom_task.' a bien été ajouté.';

            }catch(Exception $error){
                die('Error : '.$error->getMessage());
            }
        }
        //Méthode pour afficher l'ensemble des task : renvoie un tableau de l'ensemble de mes task
        public function afficherTask($bdd){
            $id_users = $this->getIdUsers();
            try{
                //Requête préparée
                $req = $bdd->prepare('select * from task where id_users = ?');

                //Binding de Paramètre
                $req->bindParam(1,$id_users,PDO::PARAM_INT);

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

        public function deleteTask($bdd){
            $id_task = $this->getIdTask();

            try{
                //Requête préparée
                $req = $bdd->prepare('delete from task where id_task = ?');

                //Binding de Paramètre
                $req->bindParam(1,$id_task,PDO::PARAM_INT);

                //Exécution de la Requête
                $req->execute();

                //Message de retour
                return 'Suppression effectuée avec succès';

            }
            catch(Exception $error){
                die('Error :'.$error->getMessage());
            }
        }

}

?>