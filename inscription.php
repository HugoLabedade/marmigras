<?php
session_start();
include_once('config.php');

if (!empty($_POST["username"])) {
    $hachage = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $pdo->prepare("INSERT INTO clients(username_client, mail_client, imc, mdp_client) VALUES('{$_POST["username"]}','{$_POST["mail"]}', '{$_POST["imc"]}','{$hachage}')");
    $query->execute();

    $query8 = $pdo->prepare("SELECT mail_client FROM clients WHERE username_client = '{$_POST['username']}'");
    $query8->execute();
    $prout3 = $query8->fetch();

    $dest = $prout3["mail_client"];
    $sujet = "Marmigras";
    $corp = htmlspecialchars("Bienvenue sur Marmigras, vous venez de creer un compte sur notre site. Vous pouvez maintenant creer vos recettes et naviguer sur notre site.");
    $headers = "From: marmigras@gmail.com";

            if (mail($dest, $sujet, $corp, $headers)) {
                echo "";
              } else {
                echo "Échec de l'envoi de l'email...";
              }
    header("Location: http://localhost:8080/projet_web/connexion.php");
    exit;
}
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
        <div class="centerHeadLogo">
            <a class="centerHeadLogo" href="./index.php">
                <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
            </a>
        </div>
            <form class="searchbar" action='./resultat_search_bar.php' method='get'>
            <input type='text' name='query' placeholder="Rechercher"/></form>
        <div class="connex">     
            <form action='./connexion.php' method='post'>
            <a href="./connexion.php">Connexion</a></form>
        </div>
    </header>
    <div class="connexion">
        <h2 class="inscrivez">Inscrivez-vous pour acceder aux fonctionnalités</h2>
        <form class="form" method='post'>
            <input type='text' name='username' placeholder="Identifiant"/>
            <input type='password' name='password' placeholder="Mot de passe" />
            <input type='text' name='mail' placeholder="Adresse mail"/>
            <input type='text' name='imc' placeholder="Votre IMC"/>
            <button type='submit' class="bouton">Se connecter</button>
        </form>


        <form class='connectez' action='./connexion.php' method='post'>            
        <a href="./connexion.php"><h3>Vous avez déjà un compte ? Connectez-vous</h3></a></form>
    </div>
</body>