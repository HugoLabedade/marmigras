<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username_client'])) {
    header("Location: http://localhost:8080/projet_web/index.php");
}

if (!empty($_POST["favoris"])) {
    $query = $pdo->prepare("INSERT INTO recommendations(id_client, ingredient) VALUES('{$_SESSION[id]}',lower('{$_POST["favoris"]}'))");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/favoris.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="./style.css" >
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Marmigras</title>
    <meta name="description" content="MARMIGRAS, initial-scale=1">
    <meta charset="utf_8">
</head>

<body>
        <header id="container2">
            <div class="centerHeadLogo">
                <a class="centerHeadLogo" href="./index2.php">
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
            <form class="searchbar" action='./resultat_search_bar.php' method='get'>
            <input type='text' name='query' placeholder="Rechercher"/></form>
            <div class="connex">     
                <form action='./compte.php' method='post'>
                <a href="./compte.php">Mon compte</a></form>
            </div>
        </div>
        </header>

    <div class="connexion">
        <h2 class="connectez2" style="margin-bottom: 60px; margin-top: 60px;">Veuillez renseigner vos favoris ici (inscrivez les au pluriel et PAS au singulier) </h2>
        <form class="form" method='post'>
            <input type='text' name='favoris' placeholder="Ingredient" style="margin-bottom: 50px;"/>
            <button type='submit' class='bouton'>Enregistrer</button>
        </form>
    </form>
    