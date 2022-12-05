<?php
class User {
    //Attributs
    private $nameUser;
    private $first_name;
    private $mdp_user;


    //Constructeur
    public function __construct($nameUser,$first_name,$mdp_user){
        $this->nameUser = $nameUser;
        $this->first_name= $first_name;
        $this->mdp_user = $mdp_user;
    }

     //GETTER SETTER
     public function getnameUser(){
        return $this->nameUser;
    }

    public function getfirst_name(){
        return $this->first_name;
    }

    public function getmdp_user(){
        return $this->mdp_user;
    }

    //SETTER

    public function setnameUser($nameUser){
        $this->nameUser = $nameUser;
    }

    public function setfirst_name($first_name){
        $this->first_name = $first_name;
    }

    public function setNom($mdp_user){
        $this->mdp_user = $mdp_user;
    }
}
?>
