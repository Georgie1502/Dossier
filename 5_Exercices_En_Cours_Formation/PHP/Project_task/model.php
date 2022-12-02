<?php

 //requête préparé qui va insérer le contenu

 try{
    $req = $bdd->prepare("insert into user (name_user, first_name_user , login_user, mdp_user) values (?,?,?,?)");
   // Aliasion entre mes parametres  
    $req->bindParam(2,$name_user,PDO::PARAM_STR);
    $req->bindParam(1, $first_name_user,PDO::PARAM_STR);
    $req->bindParam(3, $login_user,PDO::PARAM_STR);
    $req->bindParam(4, $mdp_user,PDO::PARAM_STR);

    $req->execute();
    echo"<p>User enregistré en BDD</p>";

}catch(Exception $error){
    var_dump("<p>".$error."</p>");
}


//requête préparé qui va insérer le contenu
try{
    $req = $bdd->prepare("select name_user, first_name_user , login_user, mdp_user from user");
    $req->execute();

    $data = $req->fetchAll();
        foreach($data as $row){
            echo "<li>Login :".$row["login_user"]."  - Nom : ".$row["name_user"]."  - First name : ".$row["first_name_user"]."  - MDP : ".$row["mdp_user"]." </li>";
        }

    echo"<p>User enregistré en BDD</p>";

}catch(Exception $error){
    var_dump("<p>".$error."</p>");
}
?>