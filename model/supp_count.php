<?php

session_start();
include ("../model/root.php");
include ("../model/connexion.php");

$id = $_SESSION['id'];
$query= $database->prepare("DELETE FROM users WHERE `users`.`id` LIKE '$id'");
$query->execute();
if(isset($_SESSION)){

    session_destroy();
    session_unset();
    header('Location: /myMeetic/view/form_inscription.php');
}

?>