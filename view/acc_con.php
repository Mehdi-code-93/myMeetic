<?php
session_start();
if(empty($_SESSION)) 
{ 
    header('Location: /myMeetic/view/form_inscription.php');
    exit;
}
else{
    // session_start();
    include "./header_user.php";
    include ("../model/root.php");
    include ("../model/connexion.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/acc_con.css">
    <title>Document</title>
</head>
<body>
    
    <main>

        <div class="lesBlok blok1">

            <div id="blok">

                <div id="user">

                    <div id="logoUser"></div>

                        <?php
                            include "../model/connexion.php";

                            if(isset($_SESSION['id'])){

                                echo ("<h4>"."Bienvenue : " .  $_SESSION['prenom'] ." ". $_SESSION['nom'] ."</h4>");
                            }
                        ?>
                </div>

                <div id="userBlok2">
                        <h4>Rechercher une personne :</h4>
                    <form id="formRecherche" method="get">
                        <div id="blokFormRecherche">

                            <div class="lesChoix">
                                <label for="sexe">Sexe</label>
                                <select type="sexe" class="choix" name="sexeform">
                                    <option></option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>

                            <!-- <div class="lesChoix">
                                <select type="text" class="choix" name="age">
                                    <option>Age</option>
                                    <option value="age">18 / 22</option>
                                    <option value="age">22 / 26</option>
                                </select>
                            </div> -->
                            



                            <div class="lesChoix">
                            <label for="sexe">Etude</label>

                                <select type="text" class="choix" name="etudeform">
                                    <option></option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Science">Science</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Politique">Politique</option>
                                </select>
                            </div>

                            
                            <div class="lesChoix">
                            <label for="sexe">Club</label>

                                <select type="text" class="choix" name="clubform">
                                    <option></option>
                                    <option value="Sport">Sport</option>
                                    <option value="Lecture">Lecture</option>
                                    <option value="Théatre">Théatre</option>
                                </select>
                            </div>
                        </div>

                        <input id="submite" type="submit" value="Rechercher" name="submite"/>
                    </form>



                    <div id="blokBoutton">
                        <button>Gerer mon compte</button>
                        <button>Nous contacter</button>
                        <button id="bouton2"><a href="../model/supp_count.php">Supprimer mon compte</a></button>
                    </div>
                </div>

            </div>

        </div>
    


<!-- =====================blok de la recherche des personne==================== -->

        <div class="lesBlok blok2">
            <div id="affUser">
                <h2>Resultat</h2>

            <div class="carousel">
                <div class="carousel-container">

                <?php

                    $hobbies = $_SESSION['hobbies'];
                    $sexe = $_SESSION['sexe'];
                    $etude = $_SESSION['etude'];
                    $club = $_SESSION['club'];
                    $email = $_SESSION['email'];



                    // requette avec filtre
                    // $query= $database->prepare("SELECT * FROM users WHERE (sexe != '$sexe' AND email != '$email') AND (etude LIKE '$etude' OR club LIKE '$club' OR hobbies LIKE '%$hobbies%')");
                    // $query= $database->prepare("SELECT * FROM users WHERE (sexe != '$sexe' AND email != '$email') AND (etude LIKE '$etude' OR club LIKE '$club' OR hobbies LIKE '%$hobbies%')");


                    //if (isset($_POST['sexeform']) || (isset($_POST['etudeform'])) || (isset($_POST['clubform']))) {
                    if (isset($_GET['submite'])) {
                       // echo "sub";

                        $sexeForm = $_GET['sexeform'];
                        $etudeForm = $_GET['etudeform'];
                        $clubForm = $_GET['clubform'];

                        if (!empty($_GET['sexeform']) && (!empty($_GET['etudeform'])) && (!empty($_GET['clubform']))) {
                         
                            $query = $database->prepare("SELECT * FROM users WHERE email != '$email' AND sexe LIKE '$sexeForm' AND etude LIKE '$etudeForm' AND club LIKE '$clubForm'");
                            $query->execute();
                            $resulat = $query->fetchAll();
    
                            foreach ($resulat as $key => $option) {
                                echo(  
                                    
                                        "<div class='carte'>".
                                            "<div id='logoUsers'>-</div>".
                                            "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                            "<h5>Age : ".$option['age']." ans"."</br>".
                                            "Sexe : ".$option['sexe']."</br>".
                                            "Etude : ".$option['etude']."</br>".
                                            "Club : ".$option['club']."</h5>".
                                            "Club : ".$option['hobbies']."</h5>".
                                        "</div>");
                             }
                        }
                        elseif (!empty($_GET['sexeform']) && (!empty($_GET['etudeform']))) {
                            $query= $database->prepare("SELECT * FROM users WHERE email != '$email' AND sexe LIKE '$sexeForm' AND etude LIKE '$etudeForm'");
                            $query->execute();
                            $resulat = $query->fetchAll();
                         

    
                            foreach ($resulat as $key => $option) {
                                echo(  
                                    
                                        "<div class='carte'>".
                                            "<div id='logoUsers'>-</div>".
                                            "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                            "<h5>Age : ".$option['age']." ans"."</br>".
                                            "Sexe : ".$option['sexe']."</br>".
                                            "Etude : ".$option['etude']."</br>".
                                            "Club : ".$option['club']."</h5>".
                                            "Club : ".$option['hobbies']."</h5>".

                                        "</div>");
                             }
                        }
                        elseif (!empty($_GET['sexeform']) && (!empty($_GET['clubform']))) {
                            $query= $database->prepare("SELECT * FROM users WHERE email != '$email' AND sexe LIKE '$sexeForm' AND club LIKE '$clubForm'");
                            $query->execute();
                            $resulat = $query->fetchAll();
                         

    
                            foreach ($resulat as $key => $option) {
                                echo(  
                                    
                                        "<div class='carte'>".
                                            "<div id='logoUsers'>-</div>".
                                            "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                            "<h5>Age : ".$option['age']." ans"."</br>".
                                            "Sexe : ".$option['sexe']."</br>".
                                            "Etude : ".$option['etude']."</br>".
                                            "Club : ".$option['club']."</h5>".
                                            "Club : ".$option['hobbies']."</h5>".

                                        "</div>");
                             }
                        }
                        elseif (!empty($_GET['etudeform']) && (!empty($_GET['clubform']))) {
                            $query= $database->prepare("SELECT * FROM users WHERE email != '$email' AND etude LIKE '$etudeForm' AND club LIKE '$clubForm'");
                            $query->execute();
                            $resulat = $query->fetchAll();
                         

    
                            foreach ($resulat as $key => $option) {
                                echo(  
                                    
                                        "<div class='carte'>".
                                            "<div id='logoUsers'>-</div>".
                                            "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                            "<h5>Age : ".$option['age']." ans"."</br>".
                                            "Sexe : ".$option['sexe']."</br>".
                                            "Etude : ".$option['etude']."</br>".
                                            "Club : ".$option['club']."</h5>".
                                            "Club : ".$option['hobbies']."</h5>".

                                        "</div>");
                             }
                        }
                        else {
                            $query = $database->prepare("SELECT * FROM users WHERE (email != '$email') AND (sexe LIKE '$sexeForm' OR etude LIKE '$etudeForm' OR club LIKE '$clubForm')");
                            $query->execute();
                            $resulat = $query->fetchAll();
                         

    
                            foreach ($resulat as $key => $option) {
                                echo(  
                                    
                                        "<div class='carte'>".
                                            "<div id='logoUsers'>-</div>".
                                            "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                            "<h5>Age : ".$option['age']." ans"."</br>".
                                            "Sexe : ".$option['sexe']."</br>".
                                            "Etude : ".$option['etude']."</br>".
                                            "Club : ".$option['club']."</h5>".
                                            "Club : ".$option['hobbies']."</h5>".

                                        "</div>");
                             }
                        }

                    }
                    else{
                         // $query= $database->prepare("SELECT * FROM users WHERE hobbies LIKE '%$hobbies%' AND sexe != '$sexe'");
                    $query= $database->prepare("SELECT * FROM users WHERE (sexe != '$sexe' AND email != '$email') AND (etude LIKE '$etude' OR club LIKE '$club' OR hobbies LIKE '%$hobbies%')");

                    // $query= $database->prepare("SELECT * FROM users WHERE etude LIKE '$etude'");
                    // $query= $database->prepare("SELECT * FROM users");
                    $query->execute();
                     $resulat = $query->fetchAll();


                     foreach ($resulat as $key => $option) {
                        echo(  
                            
                                "<div class='carte'>".
                                    "<div id='logoUsers'>-</div>".
                                    "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                                    "<h5>Age : ".$option['age']." ans"."</br>".
                                    "Sexe : ".$option['sexe']."</br>".
                                    "Etude : ".$option['etude']."</br>".
                                    "Club : ".$option['club']."</h5>".
                                    "Club : ".$option['hobbies']."</h5>".

                                "</div>");
                     }
                    }
                    






    
                    // $query= $database->prepare("SELECT * FROM users WHERE hobbies LIKE '%$hobbies%' AND sexe != '$sexe'");
                    //$query= $database->prepare("SELECT * FROM users WHERE (sexe != '$sexe' AND email != '$email') AND (etude LIKE '$etude' OR club LIKE '$club' OR hobbies LIKE '%$hobbies%')");

                     // $query= $database->prepare("SELECT * FROM users WHERE etude LIKE '$etude'");
                     // $query= $database->prepare("SELECT * FROM users");
                     //$query->execute();
                      //$resulat = $query->fetchAll();

                    //  foreach ($resulat as $key => $option) {
                    //     echo(  
                            
                    //             "<div class='carte'>".
                    //                 "<div id='logoUsers'>-</div>".
                    //                 "<h3>".$option['prenom']." ".$option['nom']."</h3>".
                    //                 "<h5>".$option['age']." ans"." ".$option['etude']."</h5>".
                    //             "</div>");
                    //  }
                     //"<img src=../view/asset/utilisateur.png >".
                ?>
                </div>


            </div>
            
                    
                        <button id="pre" class="carousel-prev"></button>
                        <button id="next" class="carousel-next"></button>
                </div>
                
            </div>
            
        </div>



<!-- <div class="carousel">
  <div class="carousel-container">
  
  </div>
  <button class="carousel-prev">Précédent</button>
  <button class="carousel-next">Suivant</button>
</div> -->

    </main>



<script src="./script.js"></script>
</body>
</html>