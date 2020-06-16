<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username_client'])) {
    header("Location: http://localhost:8080/projet_web/index.php");
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Marmigras</title>
    <meta name="description" content="MARMIGRAS, initial-scale=1">
    <meta charset="utf_8">
</head>

<body>
    <div id="container">
    <header id="container">
        <div class="centerHeadLogo">
            <a href="./index2.php">
                <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
            </a>
        </div>
        <nav>
            <ul class="centerHead">
                <li><a href="./mes_recettes.php">Mes recettes</a></li>
                <li><a href="./creation_recette.php">Partager une nouvelle recette</a></li>
                <li><a href="./mon_profil.php">Profil</a></li>
                <li><a href="./deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
        <div>
            <form class="searchbar" action='./login.php' method='post'>
            <input type='text' name='rechercher' placeholder="Rechercher"/></form>
        </div>
        <div class='connex'>    
            <form action='./compte.php' method='post'>
            <a href="./compte.php">Mon compte</a></form>
        </div>
        </header>
    </div>
    <div class='page'>
    </div>
</body>