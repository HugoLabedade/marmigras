<?php
session_start();
include_once('config.php');

if (!empty($_POST["username"])) {
    $hachage = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = $pdo->prepare("INSERT INTO admins(username_admin, mail_admin, mdp_admin) VALUES('{$_POST["username"]}','{$_POST["mail"]}','{$hachage}')");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/admin.php");
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
    <header id="container">
        <div class="centerHeadLogo">
            <a class="centerHeadLogo" href="./index.php">
                <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
            </a>
        </div>
            <form class="searchbar" action='./login.php' method='post'>
            <input type='text' name='rechercher' size="100" placeholder="Rechercher"/></form>
        <div class="connex">     
            <form action='./connexion.php' method='post'>
            <a href="./connexion.php">Connexion</a></form>
        </div>
    </header>
    <div class="connexion">
        <h2 class="inscrivez">faire un admin</h2>
        <form class="form" method='post'>
            <input type='text' name='username' placeholder="Identifiant admin"/>
            <input type='password' name='password' placeholder="Mot de passe" />
            <input type='text' name='mail' placeholder="Adresse mail"/>
            <button type='submit' class="bouton">Creation</button>
        </form>
    </div>
</body>