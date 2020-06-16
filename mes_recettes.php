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
    <link rel="stylesheet" href="./style.css" >
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Marmigras</title>
    <meta name="description" content="MARMIGRAS, initial-scale=1">
    <meta charset="utf_8">
</head>

<body style="height: 1500px;">
        <header id="container3">
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
                <form class="searchbar" action='./resultat_search_bar.php' method='get'>
                <input type='text' name='query' placeholder="Rechercher"/></form>
            </div>
            <div class="connex">     
                <form action='./compte.php' method='post'>
                <a href="./compte.php">Mon compte</a></form>
            </div>
        </header>
        <div class="jpp">
    <?php
            $query = $pdo->prepare("
            SELECT id_recette, nom_recette, nb_personne, temps_recette, text_recette FROM recettes WHERE id_client = {$_SESSION['id']}
            ");
            $query->execute();

            while($infos_recette = $query->fetch()) {
                echo "
                    <li>Nom : {$infos_recette['nom_recette']}</li>
                    <li>Nombre de couvert : {$infos_recette['nb_personne']}</li>
                    <li>Temps de preparation : {$infos_recette['temps_recette']}</li>
                    <li>Descriptif de la recette : {$infos_recette['text_recette']}</li>";
                echo "<br>";
            }
        ?>
        </div>
</body>