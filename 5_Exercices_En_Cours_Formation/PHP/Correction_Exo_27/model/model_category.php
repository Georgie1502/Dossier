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

        //GETTER et SETTER
        public function getIdCat(){
            return $this->id_cat;
        }
        public function getNameCat(){
            return $this->name_cat;
        }

        public function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }
        public function setNameCat($name_cat){
            $this->name_cat = $name_cat;
        }
        
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
        }*/
    }

?>