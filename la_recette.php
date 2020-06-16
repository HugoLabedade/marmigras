<?php
session_start();
include_once('config.php');

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
        <div class="la_recette">
    <?php


        $query = $pdo->prepare("SELECT r.id_recette, r.nom_recette, r.nb_personne, r.temps_recette, r.text_recette, i.ingredient, image FROM recettes r 
        INNER JOIN ingredients i ON r.id_recette=i.id_recette
        WHERE r.id_recette = '{$_GET['id_recette']}'");
        $query->execute();
        $infos_recette = $query->fetch();


        $query3 = $pdo->prepare("SELECT * from ingredients WHERE id_recette = {$_GET['id_recette']}");
        $query3->execute();

        $path_image = "./".$infos_recette['image'];
        echo "                
            <div class= 'liste'>
                <h2>{$infos_recette['nom_recette']}</h2>
                <img class='imagee2' src='{$path_image}'>
                <table class='liste2'>
                    <tr>                    
                        <th>Nombre de couvert :</th>   
                        <th>Temps de preparation :</th>
                    </tr>
                    <tr>
                        <td>{$infos_recette['nb_personne']}</td>
                        <td>{$infos_recette['temps_recette']}</td>
                    </tr>
                </table>
                <hr><br>
                <div class='menu_rec'>
                    <div class='menu_rec2'>
                    <span class='gras'>Ingredients :</span>
                    <br>
                    ";
                        while($result = $query3->fetch()) {
                            echo "
                            {$result['ingredient']} <br><br>
                            ";
                        };
              echo"</div>

                    <div class='vl'></div>

                    <div class='menu_rec3'>
                        <span class='gras'>Descriptif de la recette :</span><br>
                         {$infos_recette['text_recette']}
                    </div>
                </div>
            </div>";
    ?>

        <a href="./index2.php" class="retour">< Retourner aux recettes</a>
    </div>
</body>
 
