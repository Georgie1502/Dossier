<?php
class Taks {
    //Attributs
    private $nom_task;
    private $content_task;
    private $date_task;


    //Constructeur
    public function __construct($nom_task,$content_task,$date_task){
        $this->nom_task = $nom_task;
        $this->content_task= $content_task;
        $this->date_task = $date_task;
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
