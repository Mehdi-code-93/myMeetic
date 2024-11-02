<?php

include ("../model/root.php");
include ("../model/inscription.php");

    if(!empty($_SESSION)){
        include "./header_user.php";
    }
    else{
        include "./header.php";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insc.css">
    <title>Document</title>
</head>
<body>


<main>

<div class="blok blok1">
    
<form method="post">

<div id="blokForm">

<h3>Inscription</h3>

    <div class="input">
        <input type="text" id="prenom" name="prenom" placeholder="Prenom">
    </div>
    <?php
    if(isset($error_prenom)){
        echo $error_prenom;
    }
    ?>

    <div class="input">
        <input type="text" id="nom" name="nom" placeholder="Nom">
    </div>

    
    <div class="lesChoix">
        <select type="sexe" class="choix" name="sexe">
            <option>Sexe :</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
    </div>



    <div class="input">
        <input type="number" id="age" name="age" placeholder="Age">
    </div>
    <?php
    if(isset($error_age)){
        echo $error_age;
    }
    ?>




    <div class="lesChoix">
        <select type="text" class="choix" name="etude">
            <option>Etude :</option>
            <option value="Informatique">Informatique</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Politique">Politique</option>
        </select>
    </div>




    <div class="lesChoix">
        <select type="text" class="choix" name="club">
            <option>Club :</option>
            <option value="Sport">Sport</option>
            <option value="Lecture">Lecture</option>
            <option value="Théatre">Théatre</option>
        </select>
    </div>


    



    

    <div class="input">
        <input type="text" id="hobbies" name="hobbies" placeholder="Hobbies">
    </div>
    
    <div class="input">
        <input type="email" id="email" name="email" placeholder="Email">
    </div>

    <div class="input">
        <input type="password" id="password" name="password" placeholder="Mot de passe">
    </div>

</div>

    <input id="boutton" type="submit" name="submit">


    <h5>Vous avez deja un compte ?</br>
            <a id="btnInscrit" href="../view/form_connexion.php">Connectez vous !</a>
    </h5>
</form>


</div>



<div class="blok blok2"></div>

</main>


</body>
</html>