<?php
session_start();
include_once('config.php');




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
    <div>
    <header id="container2">
        <div class="centerHeadLogo">
            <a href="./index2.php">
                <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
            </a>
        </div>
        <div>
            <form class="searchbar" action='./login.php' method='post'>
            <input type='text' name='rechercher' placeholder="Rechercher"/></form>
        </div>
        <div class="connex">    
            <form action='./compte.php' method='post'>
            <a href="./compte.php">Mon compte</a></form>
        </div>
        </header>
    <div class="connexion">
        <h2 class="connectez2">Connexion </h2>
        <form class="form" action='./login.php' method='post'>
            <input type='text' name='username' placeholder="Identifiant"/>
            <input type='password' name='password' placeholder="Mot de passe" />
            <button type='submit' class='bouton'>Se connecter</button>
        </form>

        
        <form class='connectez' action='./inscription.php' method='post'>            
        <a href="./inscription.php"><h3>Vous n'avez pas de compte ? Inscrivez-vous</h3></a></form>
        <br>
        <form class='connectez' action='./admin.php' method='post'>            
        <a href="./admin.php"><h3>Vous êtes administrateur de marmigras ? Connectez-vous</h3></a></form>            
    </div>
</body>