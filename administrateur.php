<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username_admin'])) {
    header("Location: http://localhost:8080/projet_web/index.php");
}

if (!empty($_POST["nm"])) {
    $query = $pdo->prepare("UPDATE admins SET username_admin ='{$_POST["username"]}' WHERE username_admin LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
} 

if (!empty($_POST["username"])) {
    $hachage = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = $pdo->prepare("UPDATE admins SET mdp_admin ='{$_POST["password"]}','{$hachage}' WHERE username_admin LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
}

if (!empty($_POST["mail"])) {
    $query = $pdo->prepare("UPDATE admins SET mail_admin ='{$_POST["mail"]}' WHERE username_admin LIKE '{$_SESSION[username]}'");
    $query->execute();
    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
} 

if (!empty($_POST["id"])) {
    $query = $pdo->prepare("DELETE FROM clients WHERE id_client LIKE '%{$_POST["id"]}%'");
    $query->execute();

    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
} 
if (!empty($_POST["id_re"])) {
    $query = $pdo->prepare("DELETE FROM recettes WHERE id_recette LIKE '%{$_POST["id_re"]}%'");
    $query->execute();

    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
} 
if (!empty($_POST["id_cli"])) {
    $query = $pdo->prepare("UPDATE clients SET username_client = '{$_POST['username']}' WHERE id_client LIKE '%{$_POST["id_cli"]}%'");
    $query->execute();

    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
}
if (!empty($_POST["id_cli_pass"])) {
    $hachage = password_hash($_POST['password_cli'], PASSWORD_DEFAULT);
    $query = $pdo->prepare("UPDATE clients SET mdp_client = '{$hachage}' WHERE id_client LIKE '%{$_POST["id_cli_pass"]}%'");
    $query->execute();

    header("Location: http://localhost:8080/projet_web/administrateur.php");
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
                <a class="centerHeadLogo" href="./index.php">
                    <h1><img id="logomarmi" src="./MARMIGRAS2.png" alt="logo du site"></h1>
                </a>
            </div>
            <form class="searchbar" action='./resultat_search_bar.php' method='get'>
            <input type='text' name='query' placeholder="Rechercher"/></form>
            <div class="connex">     
                <form action='./administrateur.php' method='post'>
                <a href="./deconnexion.php">Déconnexion</a></form>
            </div>
        </div>
        </header>

    

    <p style="text-align: center; padding-top: 20px">Vous pouvez administrer</p>
    <div class='modif_client2'> 
        <form method="post">
            <ul class="centerHead2">
                <li> 
                    <form method="post">
                    <input type= "text" name="id" placeholder="id du candidat à supprimer" />          
                    <button class= "bouton"> Supprimer</button>
                    </form>
                </li>
            </ul> 
            <ul class="centerHead2">
                <li> 
                    <form method="post">
                    <input type= "text" name="id_re" placeholder="id de la recette à supprimer" />
                    <button class= "bouton"> Supprimer</button>
                    </form>
                </li>
            </ul>
            <ul class="centerHead2">
                <li> 
                <form  method="post">
                <input type= "text" name="id_cli" placeholder="id du client" />
                <input type= "text" name="username" placeholder="nouveau pseudo client" />
                <button class= "bouton"> Modifier</button>
                </li>
            </ul>
            <ul class="centerHead2">
                <li> 
                    <form method="post">
                    <input type= "text" name="id_cli_pass" placeholder="id du client" />
                    <input type= "text" name="password_cli" placeholder="nouveau mot de passe" />
                    <button class= "bouton"> Modifier</button>
                    </form>
                </li>
            </ul>
    </div>
    </form>
</body>