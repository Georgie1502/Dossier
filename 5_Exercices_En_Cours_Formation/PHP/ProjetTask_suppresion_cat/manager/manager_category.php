<?php
include('model/model_category.php');
    class ManagerCategory extends Category{
        //METHODE
        //méthode pour enregistrer une category
        public function ajoutCat($bdd){
            $name_cat = $this->getNameCat();

            try{
                //Requête préparée
                $req = $bdd->prepare('insert into category (name_cat) values (?)');

                //Binding de Param
                $req->bindParam(1,$name_cat,PDO::PARAM_STR);

                //Exécuter la requête
                $req->execute();

                //Retourner un message de confirmation
                return 'La catégorie : '.$name_cat.' a bien été ajouté.';

            }catch(Exception $error){
                die('Error : '.$error->getMessage());
            }
        }

        //Méthode pour afficher l'ensemble des catégories : renvoie un tableau de l'ensemble de mes catégories
        public function afficherCategory($bdd){
            try{
                //Requête préparée
                $req = $bdd->prepare('select * from category');

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

        public function deleteCategory($bdd){
            $id_cat = $this->getIdCat();

            try{
                //Requête préparée
                $req = $bdd->prepare('delete from category where id_cat = ?');

                //Binding de Paramètre
                $req->bindParam(1,$id_cat,PDO::PARAM_INT);

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