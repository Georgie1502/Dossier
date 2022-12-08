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

        //GETTER SETTER
        public function getname_cat(){
        return $this->name_cat;
        }

        public function getid_cat(){
            return $this->id_cat;
        }

        public function setname_cat($name_cat){
        $this->name_cat = $name_cat;
        }

        public function setid_cat($id_cat){
        id$this->id_cat = $id_cat;
        }


        //Methode

        public function insertCategory($bdd){
            //Récupérer les attributs à enregister
            $name_cat = $this->getNameCat();

            try {
                //Requête préparée
                $req = $bdd->prepare('insert into category (name_cat) values(?)');

                //Binding de Paramètre
                $req->bindParam(1,$name_cat,PDO::PARAM_STR);
            

                //Exécution de la Requête
                $req->execute();

                //Message de validation
                return $name_cat.' a bien été enregistré en BDD.';
                }
                catch(Exception $error){
                die('Error :'.$error->getMessage());
                }
        }
            //Méthode pour afficher l'ensemble des utilisateurs : renvoie un tableau de l'ensemble de mes utilisateurs
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

        


        }

    
    

?>