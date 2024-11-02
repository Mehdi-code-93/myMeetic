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
        $prenom = (String) trim($prenom);
        $nom = (String) trim($nom);
        $sexe = (String) trim($sexe);
        $age = (String) trim($age);
        $etude = (String) trim($etude);
        $club = (String) trim($club);
        $hobbies = (String) trim($hobbies);
        $email = (String) trim($email);
        $password = (String) trim($password);

        if (empty($prenom)) {
            $valid = false;
            $error_prenom = "Veuiller renseigner ce champs !";
        }
        if (empty($nom)) {
            $valid = false;
            $error_nom = "Veuiller renseigner ce champs !";
        }
        if (empty($sexe)) {
            $valid = false;
            $error_sexe = "Veuiller renseigner ce champs !";
        }
        if (empty($age)) {
            $valid = false;
            $error_age = "Veuiller renseigner ce champs !";
        }
        if ($age < 18) {
            $valid = false;
            $error_age = "Tu es trop jeune";
        }
        if (empty($etude)) {
            $valid = false;
            $error_etude = "Veuiller renseigner ce champs !";
        }
        if (empty($club)) {
            $valid = false;
            $error_club = "Veuiller renseigner ce champs !";
        }
        if (empty($hobbies)) {
            $valid = false;
            $error_age = "Veuiller renseigner ce champs !";
        }
        if (empty($email)) {
            $valid = false;
            $error_email = "Veuiller renseigner ce champs !";
        }
        if (empty($password)) {
            $valid = false;
            $error_password = "Veuiller renseigner ce champs !";
        }


        if ($valid) {

            $null = NULL;

            $password = crypt($password, '$6$rounds=5000$fnzdcdjkn6GbJF46BVBC5282hgHF6FYGV7$');

            $requette = $database->prepare("INSERT INTO users (prenom, nom, sexe, age, etude, club, hobbies, email, mdp) VALUES ('$prenom', '$nom', '$sexe', '$age', '$etude', '$club', '$hobbies', '$email', '$password')");
            $requette->execute();


            header('Location: /myMeetic/view/acc_insc.php');

            exit;
        }
    }
}






















// if(!isset($_SESSION)){

//     session_start();
// }
// elseif(empty($_SESSION)) 
// { 
//     session_unset();
//     session_destroy();
// }

// if (!empty($_POST)) {
//     extract($_POST);
//     $valid = (boolean) true;

//     if (isset($_POST['submit'])) {
//         $prenom = (String) trim($prenom);
//         $nom = (String) trim($nom);
//         $sexe = (String) trim($sexe);
//         $age = (String) trim($age);
//         $etude = (String) trim($etude);
//         $club = (String) trim($club);
//         $hobbies = (String) trim($hobbies);
//         $email = (String) trim($email);
//         $password = (String) trim($password);

//         if (empty($prenom)) {
//             $valid = false;
//             $error_prenom = "Veuiller renseigner ce champs !";
//         }
//         if (empty($nom)) {
//             $valid = false;
//             $error_nom = "Veuiller renseigner ce champs !";
//         }
//         if (empty($sexe)) {
//             $valid = false;
//             $error_sexe = "Veuiller renseigner ce champs !";
//         }
//         if (empty($age)) {
//             $valid = false;
//             $error_age = "Veuiller renseigner ce champs !";
//         }
//         if ($age < 18) {
//             $valid = false;
//             $error_age = "Tu es trop jeune";
//         }
//         if (empty($etude)) {
//             $valid = false;
//             $error_etude = "Veuiller renseigner ce champs !";
//         }
//         if (empty($club)) {
//             $valid = false;
//             $error_club = "Veuiller renseigner ce champs !";
//         }
//         if (empty($hobbies)) {
//             $valid = false;
//             $error_age = "Veuiller renseigner ce champs !";
//         }
//         if (empty($email)) {
//             $valid = false;
//             $error_email = "Veuiller renseigner ce champs !";
//         }
//         if (empty($password)) {
//             $valid = false;
//             $error_password = "Veuiller renseigner ce champs !";
//         }


//         if ($valid) {

//             $password = crypt($password, '$6$rounds=5000$fnzdcdjkn6GbJF46BVBC5282hgHF6FYGV7$');

//             $requette = $database->prepare("INSERT INTO users (prenom, nom, sexe, age, etude, club, hobbie, email, mdp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//             $requette->execute(array($prenom, $nom, $sexe, $age, $etude, $club, $hobbies, $email, $password));
//             $requette->fetch();
//             var_dump($requette);
//             echo "jhgkgk";
       


//             // $requette = $database->prepare("INSERT INTO users (nom, sexe, age, etude, club, email, mdp) VALUES (?, ?, ?, ?, ?, ?, ?)");
//             // $requette->execute(array($nom, $sexe, $age, $etude, $club, $email, $password));


//             header('Location: /myMeetic/view/acc_insc.php');

//             exit;
//         }
//     }
// }

?>