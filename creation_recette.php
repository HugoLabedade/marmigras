<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username_client'])) {
    header("Location: http://localhost:8080/projet_web/index.php");
}

if (!empty($_POST["nom_recette"]) || !empty($_POST["couvert"]) || !empty($_POST["temps_prepa"]) || !empty($_POST["descriptif"]) || !empty($_POST["fichier"])) {
    
    $dirname = 'images/'.$_POST["nom_recette"];
    $file_name = $_POST["nom_recette"].'.jpg';
    $chemin_image = $dirname.'/'.$file_name;

    $query = $pdo->prepare("INSERT INTO marmigras.recettes (nom_recette, nb_personne, temps_recette, text_recette, id_client, image) VALUES ('{$_POST["nom_recette"]}', '{$_POST["couvert"]}', '{$_POST["temps_prepa"]}', '{$_POST["descriptif"]}', '{$_SESSION["id"]}', '{$chemin_image}')");
    $query->execute();

    $str_nom_recette = strtolower($_POST["nom_recette"]);
    $dirname2 = './images/' . $str_nom_recette."/";

    if (!file_exists($dirname2)) {
        mkdir($dirname2);
    }

    $fileTmpName = $_FILES['fichier']['tmp_name'];    
    move_uploaded_file($fileTmpName, $dirname2. $file_name);

    $query2 = $pdo->prepare("SELECT id_recette FROM recettes WHERE nom_recette = '{$_POST["nom_recette"]}'");
    $query2->execute();
    $id_recette = $query2->fetch();
    $id_recette = intval($id_recette['id_recette']);
}


if (!empty($_POST["ingredient_1"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}', lower('{$_POST["ingredient_1"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_2"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_2"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_3"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_3"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_4"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_4"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_5"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_5"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_6"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_6"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_7"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_7"]}'))");
    $query3->execute();
}

if (!empty($_POST["ingredient_8"])) {
    $query3 = $pdo->prepare("INSERT INTO ingredients(id_recette, ingredient) VALUES('{$id_recette}',lower('{$_POST["ingredient_8"]}'))");
    $query3->execute();
}

if (!empty($_POST["nom_recette"])) {

    $query4 = $pdo->prepare("SELECT id_recette FROM recettes WHERE nom_recette = '{$_POST["nom_recette"]}'");
    $query4->execute();
    $id_recette_mail = $query4->fetch();



    $query6 = $pdo->prepare("SELECT * FROM clients");
    $query6->execute();
    
    while($prout = $query6->fetch()) {
        $zizi = 0;
        $query7 = $pdo->prepare("SELECT ingredient FROM recommendations WHERE id_client = '{$prout['id_client']}'");
        $query7->execute();
        while($prout2 = $query7->fetch()) {
            $query5 = $pdo->prepare("SELECT ingredient FROM ingredients WHERE id_recette = '{$id_recette_mail['id_recette']}'");
            $query5->execute();
            while($infos = $query5->fetch()) {
                if ($infos['ingredient'] == $prout2['ingredient']) {
                    $zizi += 1;

                }
            }
        }
        if ($zizi >= 3) {

            $query8 = $pdo->prepare("SELECT mail_client FROM clients WHERE id_client = '{$prout['id_client']}'");
            $query8 -> execute();
            $prout3 = $query8->fetch();
            $dest = $prout3["mail_client"];
            $sujet = "Marmigras";
            $corp = htmlspecialchars("Super ! Vous avez une nouvelle recette sur votre compte Marmigras qui comporte vos ingrédients favoris. Le nom de cette recette est ".$_POST["nom_recette"]. ".");
            $headers = "From: marmigras@gmail.com";

            if (mail($dest, $sujet, $corp, $headers)) {
                echo "";
              } else {
                echo "Échec de l'envoi de l'email...";
              }

            //envoi du mail
        }
    }
   
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
    <div class='connexion2'>
        <h2>Expliquez nous votre recette avec les critères suivants <br>
        (inscrivez les ingredients au singulier et PAS au pluriel)</h2>
        <form class='form2' method='post' enctype='multipart/form-data'>
            <input type='text' name='nom_recette' placeholder="Nom de la recette"/></br>
            <input type='text' name='couvert' placeholder="Nombre de couvert"/></br>
            <input type='text' name='temps_prepa' placeholder="Temps de préparation"/></br>
            <input type='text' name='ingredient_1' placeholder="Ingredient 1"/></br>
            <input type='text' name='ingredient_2' placeholder="Ingredient 2 (facultatif)"/></br>
            <input type='text' name='ingredient_3' placeholder="Ingredient 3 (facultatif)"/></br>
            <input type='text' name='ingredient_4' placeholder="Ingredient 4 (facultatif)"/></br>
            <input type='text' name='ingredient_5' placeholder="Ingredient 5 (facultatif)"/></br>
            <input type='text' name='ingredient_6' placeholder="Ingredient 6 (facultatif)"/></br>
            <input type='text' name='ingredient_7' placeholder="Ingredient 7 (facultatif)"/></br>
            <input type='text' name='ingredient_8' placeholder="Ingredient 8 (facultatif)"/></br>
            <p style="margin-top: 15px;">Uploadez une photo pour votre recette !</p>
            <input type='file' name='fichier' placeholder="Photo de votre recette" /><br>
            <textarea type='text' style="width: 500px; height: 200px;" name='descriptif' placeholder="Description de la recette (veuillez ne pas mettre d'apostrophe)"></textarea></br>
            <button class="bouton2" type='submit'>VALIDER</button>
        </form>
    </div>

    
    
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
        }
    </script>

</body>