<?php
    session_start();
    include "./header.php";
    include ("../model/root.php");
    include ("../model/connexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/conn.css">
    <title>Document</title>
</head>
<body>
    

<main>

<div class="blok blok1">


<?php

include "../model/connexion.php";


if(isset($_SESSION['id'])){

    echo ("<h4>Bienvenue</h4> " . $_SESSION['prenom'] ." ". $_SESSION['nom']);
}
?>
    





</div>


<div class="blok blok2"></div>


</main>


</body>
</html>