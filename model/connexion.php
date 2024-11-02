<?php
if(!isset($_SESSION)){

    session_start();
}
elseif(empty($_SESSION)) 
{ 
    session_unset();
    session_destroy();
}

if (!empty($_POST)) {
    extract($_POST);
    $valid = (boolean) true;

    if (isset($_POST['submit'])) {
        $email = (String) trim($email);
        $password = (String) trim($password);


        if (empty($email)) {
            $valid = false;
            $error_email = "Veuiller renseigner ce champs !";
        }
        else{
            $requete = $database->prepare("SELECT id FROM users WHERE email = ?");
            $requete->execute(array($email));
            $user = $requete->fetch();

            if(!isset($user['id'])){
                $valid = false;
                $error_email = "Veuiller renseigner ce champs !";
            }
        }
        if (empty($password)) {
            $valid = false;
            $error_password = "Veuiller renseigner ce champs !";
        }
        else{
            $requete = $database->prepare("SELECT id FROM users WHERE email = ? AND mdp = ?");
            $requete->execute(array($email, crypt($password, '$6$rounds=5000$fnzdcdjkn6GbJF46BVBC5282hgHF6FYGV7$')));
            $verif_user = $requete->fetch();
        }

        if(!isset($verif_user['id'])){
            $valid = false;
            $error_email = "Veuiller renseigner ce champs !";
        }
        if($valid){
            $requete = $database->prepare("SELECT * FROM users WHERE id = ?");
            $requete->execute(array($verif_user['id']));
            $verif_user = $requete->fetch();

            $_SESSION['id'] = $verif_user['id'];
            $_SESSION['prenom'] = $verif_user['prenom'];
            $_SESSION['nom'] = $verif_user['nom'];
            $_SESSION['sexe'] = $verif_user['sexe'];
            $_SESSION['age'] = $verif_user['age'];
            $_SESSION['etude'] = $verif_user['etude'];
            $_SESSION['club'] = $verif_user['club'];
            $_SESSION['hobbies'] = $verif_user['hobbies'];
            $_SESSION['email'] = $verif_user['email'];
            $_SESSION['mdp'] = $verif_user['mdp'];

            // header('Location: /myMeeticV3/view/acc_con.php');
            header('Location: /myMeetic/view/acc_con.php');
            exit;
        }
    }
}

?>