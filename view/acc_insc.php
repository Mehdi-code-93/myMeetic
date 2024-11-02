<?php

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
<link rel="stylesheet" href="./css/acc_insc.css">
<title>Document</title>
</head>
<body>


<main>

<div class="blok blok1">

<form method="post">

<div id="blokForm">

<div id="h3">
    <h3>Inscription réussi</h3>
    <p>a present connectez vous !</p>
</div>

<div class="input">
    <input type="email" id="email" name="email" placeholder="Email">
</div>
<?php
if(isset($error_email)){
    echo $error_email;
}
?>

<div class="input">
    <input type="password" id="password" name="password" placeholder="Mot de passe">
</div>
<?php
if(isset($error_password)){
    echo $error_password;
}
?>

</div>

<input id="boutton" type="submit" name="submit">


<h5>Vous n'avez pas encore de compte ?</br>
        <a id="btnInscrit" href="../view/form_inscription.php">Inscrivez vous !</a>
</h5>
</form>



</div>


<div class="blok blok2"></div>


</main>


</body>
</html>
