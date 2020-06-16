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
                    <li><a href="https://google.fr/">Toutes les recettes</a></li>
                    <li><a href="./recommendations.php">Pour vous</a></li>
                    <li><a href="./favoris.php">Favoris</a></li>
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
    <div class='jpp'>
        <div class='page'>        
            <?php

$query6 = $pdo->prepare("SELECT * FROM clients");
$query6->execute();



$array = array();

    while($prout = $query6->fetch()) {
        $query7 = $pdo->prepare("SELECT ingredient FROM recommendations WHERE id_client = '{$_SESSION['id']}'");
        $query7->execute();

        while($prout2 = $query7->fetch()) {
            $query5 = $pdo->prepare("SELECT ingredient, id_recette FROM ingredients");
            $query5->execute();
            
            while($prout3 = $query5->fetch()){            
                if($prout2["ingredient"] == $prout3["ingredient"]) {
                    $query10 = $pdo->prepare("SELECT r.id_recette, r.nom_recette, r.text_recette, r.temps_recette, r.nb_personne, r.id_client, r.image 
                    FROM recettes r
                    INNER JOIN ingredients i ON(i.id_recette=r.id_recette)
                    WHERE r.id_recette LIKE '{$prout3['id_recette']}'");            
                    $query10->execute();
                    $prout4 = $query10->fetch();
                    if(!in_array($prout4["id_recette"], $array)){
                        $array[] = $prout4["id_recette"];
                        $path_image = "./".$prout4["image"];
                        echo "
                            <a class='recettes' href='la_recette.php?id_recette=".$prout4["id_recette"]."'>                   
                                <img class='imagee' src='{$path_image}'>
                                <div class='menuu'>                       
                                    <p>{$prout4['nom_recette']}</p>      
                                </div>                                                            
                            </a>
                        </br>
                        ";
                    }

                                        
                }
            }
        }
    } 
            ?>
        </div>
    </div>
</body>


