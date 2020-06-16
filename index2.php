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
                    <li><a href="./index2.php">Accueil</a></li>
                    <li><a href="./recommendations.php">Pour vous</a></li>
                    <li><a href="./favoris.php">Favoris</a></li>
                </ul>
            </nav>
            <div>
                <form class="searchbar" action='./resultat_search_bar.php' method='post'>
                <input type='text' name='rechercher' placeholder="Rechercher"/></form>
            </div>
            <div class="connex">     
                <form action='./compte.php' method='post'>
                <a href="./compte.php">Mon compte</a></form>
            </div>
            </header>
    <div class='jpp'>
        <div class='page'>        
            <?php
            $query = $pdo->prepare("SELECT * FROM recettes");
            $query->execute();


            while ($infos_recette = $query->fetch()) {
                $path_image = "./".$infos_recette['image'];
                echo "
                        <a class='recettes' href='la_recette.php?id_recette=".$infos_recette["id_recette"]."'>                   
                            <img class='imagee' src='{$path_image}'>
                            <div class='menuu'>                       
                                <p>{$infos_recette['nom_recette']}</p>      
                            </div>                                                            
                        </a>
                    </br>
                    ";
            }
            ?>
        </div>
    </div>
</body>


