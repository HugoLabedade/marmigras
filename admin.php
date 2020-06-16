<?php
session_start();
include_once('config.php');

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Marmigras</title>
    <meta name="description" content="Marmigras">
    <meta charset="utf_8">
</head>

<body>
    <header id="container2">
        <a href="./index2.php">
            <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
        </a>
        <div>
            <form class="searchbar" action='./resultat_search_bar.php' method='post'>
            <input type='text' name='rechercher' placeholder="Rechercher"/></form>
        </div>
        <div class="connex">     
            <form action='./connexion.php' method='post'>
            <a href="./connexion.php">Connexion</a></form>
        </div>
        </header>
    </div>
    <div class="connexion">
        <h2 class="connectez2">Connexion </h2>
        <form class="form" action='./login_admin.php' method='post'>
            <input type='text' name='username' placeholder="Identifiant admin"/>
            <input type='password' name='password' placeholder="Mot de passe" />
            <button type='submit' class='bouton'>Se connecter</button>
        </form>

        <form class='connectez' action='./connexion.php' method='post'>            
        <a href="./connexion.php"><h3>Vous n'êtes pas admin ? Connectez-vous</h3></a></form>
        <form class='connectez' action='./inscription.php' method='post'>            
        <a href="./inscription.php"><h3>Vous n'avez pas de compte ? Inscrivez-vous</h3></a></form>

    </div>
</body>