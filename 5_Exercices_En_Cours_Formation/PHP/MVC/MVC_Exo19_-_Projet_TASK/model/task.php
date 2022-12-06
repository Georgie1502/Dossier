<?php
class Taks {
    //Attributs
    private $id_task;
    private $nom_task;
    private $content_task;
    private $date_task;
    private $id_user;
    private $id_cat;


    //Constructeur
    public function __construct($id_task,$nom_task,$content_task,$date_task,$id_user,$id_cat){
        $this->id_task = $id_task;
        $this->nom_task = $nom_task;
        $this->content_task= $content_task;
        $this->date_task = $date_task;
        $this->id_user = $id_user;
        $this->id_cat = $id_cat;
        
    }

     //GETTER SETTER
     public function getnom_task(){
        return $this->nom_task;
    }

    public function getcontent_task(){
        return $this->content_task;
    }

    public function getdate_task(){
        return $this->date_task;
    }

    //SETTER

    public function setnom_task($nom_task){
        $this->nom_task = $nom_task;
    }

    public function setcontent_task($content_task){
        $this->content_task = $content_task;
    }

    public function setdate_task($date_task){
        $this->date_task = $date_task;
    }
}
?>
