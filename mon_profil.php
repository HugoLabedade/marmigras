<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username_client'])) {
    header("Location: http://localhost:8080/projet_web/index.php");
}

if (!empty($_POST["nm"])) {
    $query = $pdo->prepare("UPDATE clients SET username_client ='{$_POST["nm"]}' WHERE username_client LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/index2.php");
    exit;
} 

if (!empty($_POST["username"])) {
    $hachage = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = $pdo->prepare("UPDATE clients SET mdp_client ='{$_POST["password"]}','{$hachage}' WHERE username_client LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/index2.php");
    exit;
}

if (!empty($_POST["mail"])) {
    $query = $pdo->prepare("UPDATE clients SET mail_client ='{$_POST["mail"]}' WHERE username_client LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/index2.php");
    exit;
} 

if (!empty($_POST["imc"])) {
    $query = $pdo->prepare("UPDATE clients SET imc ='{$_POST["imc"]}' WHERE username_client LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/index2.php");
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

    

    <p style="text-align: center; padding-top: 20px">Vous pouvez modifier votre profil ici</p>
    <div class='modif_client'> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <form method="post">
            <ul class="centerHead2">
                <li> 
                    <input class="form-btn" type="button" name="name" value="Username" >  
                    <input class="hidden-form" type="text" name="nm" placeholder='Nouveau username'>
                </li>
            </ul> 
            <ul class="centerHead2">
                <li> 
                    <input class="form-btn" type="button" name="mdp" value="Mot de passe" >
                    <input class="hidden-form" type="text" name="password" placeholder='Nouveau Mot de passe'>
                </li>
            </ul>
            <ul class="centerHead2">
                <li> 
                    <input class="form-btn" type="button" name="email" value="Adresse mail" >
                    <input class="hidden-form" type="text" name="mail" placeholder='Nouveau mail'>
                </li>
            </ul>
            <ul class="centerHead2">
                <li> 
                    <input class="form-btn" type="button" name="benjam" value="IMC" >
                    <input class="hidden-form" type="text" name="imc" placeholder='Nouveau IMC'>
                </li>
            </ul>
    </div>
    <button class="bouton2" type="submit" >Enregistrer</button>
    </form>
    
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
    <script>
        $('.form-btn').click(function(){
        $(this).next().toggleClass('show-form');
        });
    </script>

</body>