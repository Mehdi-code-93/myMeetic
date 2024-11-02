<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <title>Document</title>
</head>
<body>

<header>

<nav>
    <a href="../view/form_inscription.php"><img id="home" src="asset/Cupilove.png"></a>
    <ul>
        <li><a class="lienA" href="#">Contact</a></li>
        <li><a class="lienA" href="../view/acc_con.php"><?php echo $_SESSION['prenom'] ?></a></li>
        <li><a class="lienA lienConn" href="../model/deconnexion.php">Deconnexion</a></li>

    </ul>
</nav>

</header>

</body>
</html>