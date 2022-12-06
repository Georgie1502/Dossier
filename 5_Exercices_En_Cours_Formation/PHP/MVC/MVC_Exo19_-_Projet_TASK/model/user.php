<?php
class User {
    //Attributs
    private $id_user;
    private $name_user;
    private $first_name_user;
    private $login_user;
    private $mdp_user;


    //Constructeur
    public function __construct($id_user,$name_user,$first_name_user,$login_user,$mdp_user){
        $this->name_user = $name_user;
        $this->first_name_user= $first_name_user;
        $this->login_user = $login_user;
        $this->mdp_user = $mdp_user;
    }

     //GETTER recuper les valeurs
     public function getname_user(){
        return $this->name_user;
    }

    public function getfirst_name_user(){
        return $this->first_name_user;
    }

    public function getlogin_user(){
        return $this->login_user;

    public function getmdp_user(){
        return $this->mdp_user;
    }

    public function getid_user(){
        return $this->id_user;
    }

    //SETTER modification d'un valeur
    public function setid_user($id_user){
        $this->id_user= $id_user;
    }
    public function setname_user($name_user){
        $this->name_user = $name_user;
    }

    public function setfirst_name_user($first_name_user){
        $this->first_name_user = $first_name_user;
    }

    public function setlogin_user($login_user){
        $this->login_user = $login_user;
    }

    public function setmdp_user($mdp_user){
        $this->mdp_user = $mdp_user;
    }

    //Méthodes 



    public function ajouterUser($bdd){
        try{
            $req = $bdd->prepare('insert into users (name_users, first_name_users, login_users, mdp_users) values(?,?,?,?)');
            $name_users = $this->getnameUser();
            $first_name_users= $this->getfirst_name();
            $login_users=$this->getloginUser();
            $mdp_users=$this->getmdp_users();

            $req->bindParam(1,$name_users,PDO::PARAM_STR);
            $req->bindParam(2,$first_name_users,PDO::PARAM_STR);
            $req->bindParam(3,$login_users,PDO::PARAM_STR);
            $req->bindParam(4,$mdp_users,PDO::PARAM_STR);
            $req->execute();
            echo"<p>L'Utilisateur $name_users $first_name_users a bien été enregistré. Login : $login_users</p>";
        }catch(Exception $error){
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$error->getMessage());
        }

    }

    public function afficherUser($bdd){
        try{
            $req = $bdd->prepare('select * from users');
            $req->execute();
        
           $data=$req->fetchAll();
        
           
        }
        
        
        }catch(Exception $error){
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$error->getMessage());
        }

    }

    public function deleteUser(){
        

    }
    }

}
?>
