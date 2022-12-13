<?php
//CONTROLLER
    session_start();
    include('utils/connect.php');
    include('manager/manager_user.php');
    include('vue/header.php');
    include('vue/vue_user.php');

    $message="";
    $message_co="";

    //INSCRIPTION USER
    if(isset($_POST['name_users']) and $_POST['name_users']!=""
    and isset($_POST['first_name_users']) and $_POST['first_name_users']!=""
    and isset($_POST['login_users']) and $_POST['login_users']!=""
    and isset($_POST['mdp_users']) and $_POST['mdp_users']!=""){
        //Récupération des données à enregister en BDD
        $name_users = $_POST['name_users'];
        $first_name_users = $_POST['first_name_users'];
        $login_users = $_POST['login_users'];
        $mdp_users = $_POST['mdp_users'];

        //Création de l'utilisateur qui veut s'enregistrer
        $user = new ManagerUser('', $name_users, $first_name_users, $login_users, $mdp_users);


        //J'effectue la requête pour enregistrer l'utilisateur en BDD
        $message = $user->insertUser($bdd);
        //echo "<p>$message</p>";
    }

    //CONNEXION USER
    if(isset($_POST['login_users_connexion']) and $_POST['login_users_connexion']!=""
    and isset($_POST['mdp_users_connexion']) and $_POST['mdp_users_connexion']!=""){
        //Récupération des données de connexion
        $login_users_connexion = $_POST['login_users_connexion'];
        $mdp_users_connexion = $_POST['mdp_users_connexion'];

        //Création de l'utilsateur qui veut se connecter
        $user_connect = new ManagerUser('','','',$login_users_connexion,$mdp_users_connexion);

        //Récupération des données users en BDD dans $data
        $data = $user_connect->selectUsersFromLogin($bdd);

        if(!empty($data)){

            //Récupérer le mot de passe de l'utilisateur dans le tableau $data -> donc foreach
            foreach($data as $row){
                //comparaison du mot de passe
                if($row['mdp_users'] == $mdp_users_connexion){
                    //Création de mes variables de SESSION
                    $_SESSION['id_users'] = $row['id_users'];
                    $_SESSION['name_users'] = $row['name_users'];
                    $_SESSION['first_name_users'] = $row['first_name_users'];
                    $_SESSION['login_users'] = $row['login_users'];
                    $_SESSION['mdp_users'] = $row['mdp_users'];
                    $_SESSION['connexion']=true;

                    $message_co = $_SESSION['login_users']." est bien connecté.";
                } else {
                    $message_co = 'Identifiant ou mot de passe non valide';
                }
            }
        }else{
            $message_co = 'Identifiant ou mot de passe non valide';
        }
    }
    

    include('vue/footer.php');

echo'<script>
            let message = document.querySelector("#message");
            message.innerHTML="'.$message.'";
            let message_connexion = document.querySelector("#message_connexion");
            message_connexion.innerHTML="'.$message_co.'";           
     </script>';
?>
