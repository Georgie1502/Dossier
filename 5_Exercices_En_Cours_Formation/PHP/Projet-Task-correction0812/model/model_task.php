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
         public function getIdTask(){
            return $this->id_task;
        }
        public function getNomTask(){
            return $this->nom_task;
        }
        public function getContentTask(){
            return $this->content_task;
        }
        public function getDateTask(){
            return $this->date_task;
        }
        public function getIdUsers(){
            return $this->id_users;
        }
        public function getIdCat(){
            return $this->id_cat;
        }

        public function setIdTask($id_task){
            $this->id_task = $id_task;
        }
        public function setNomTask($nom_task){
            $this->$nom_task = $$nom_task;
        }
        public function setContentTask($content_task){
            $this->content_task = $content_task;
        }
        public function setDateTask($date_task){
            $this->date_task = $date_task;
        }
        public function setIdUsers($id_users){
            $this->id_users = $id_users;
        }
        public function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }

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
    }
?>