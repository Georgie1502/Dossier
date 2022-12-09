<?php
class Utilisateur{
    //ATTRIBUTS
    private $id_utilisateur;
    private $login_utilisateur;
    private $mdp_utilisateur;

    //CONSTRUCTEUR
    public function __construct($id_utilisateur,$login_utilisateur,$mdp_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
        $this->login_utilisateur = $login_utilisateur;
        $this->mdp_utilisateur = $mdp_utilisateur;
    }

    //GETTER et SETTER
    public function getIdUtilisateur(){
        return $this->id_utilisateur;
    }
    public function getLoginUtilisateur(){
        return $this->login_utilisateur;
    }
    public function getMdpUtilisateur(){
        return $this->mdp_utilisateur;
    }

    public function setIdUtilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }
    public function setLoginUtilisateur($login_utilisateur){
        $this->login_utilisateur=$login_utilisateur;
    }
    public function setMdpUtilisateur($mdp_utilisateur){
        $this->mdp_utilisateur=$mdp_utilisateur;
    }

    //METHODES
    public function ajoutUtilisateur($bdd){
        //Récupère les infos de mon utilisateur à enregister
        $login_utilisateur = $this->getLoginUtilisateur();
        $mdp_utilisateur = $this->getMdpUtilisateur();

        try{
            //Requête préparée
            $req = $bdd->prepare('insert into utilisateur (login_utilisateur, mdp_utilisateur) values (?,?)');

            //Binding de Paramètre
            $req->bindParam(1,$login_utilisateur,PDO::PARAM_STR);
            $req->bindParam(2,$mdp_utilisateur,PDO::PARAM_STR);

            //Exécuter la requête
            $req->execute();

            //Retourner un message de confirmation
            return "L'utilisateur ".$login_utilisateur." est bien enregistré.";


        }catch(Exception $error){
            die('Error : '.$error->getMessage());
        }
    }

    public function selectUtilisateurFromLogin($bdd){
        //Je stocke le login de l'utilisateur recherché
        $login_utilisateur = $this->getLoginUtilisateur();

        //Try-catch de la requête
        try{
            //Requête préparée
            $req = $bdd->prepare('select * from utilisateur where login_utilisateur = ?');

            //Binding de Paramètre
            $req->bindParam(1,$login_utilisateur,PDO::PARAM_STR);

            //Exécuter la requête
            $req->execute();

            //Récupérer la réponse de la BDD dans une variable $data
            $data = $req->fetchAll();

            //Retourne $data pour le controler
            return $data;

        }catch(Exception $error){
            die('Error : '.$error->getMessage());
        }
    }
}
?>