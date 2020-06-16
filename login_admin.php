<?php 
session_start();
include_once('config.php');
$query = $pdo->prepare("SELECT id_admin, username_admin, mdp_admin FROM admins WHERE username_admin = ('{$_POST['username']}')");
$query->execute();
$resultat = $query->fetch();


if($resultat == null){
  header("Location: http://localhost:8080/projet_web/index.php");
  exit;
}
$password = password_verify($_POST['password'], $resultat['mdp_admin']);

if (!$resultat)
{
  header("Location: http://localhost:8080/projet_web/index.php");
  exit;
}
else
{
  if ($password) {
    $_SESSION['username_admin'] = $resultat['username_admin'];
    $_SESSION["id"] = $resultat["id_admin"];
    header("Location: http://localhost:8080/projet_web/administrateur.php");
    exit;
  }
  else {
    header("Location: http://localhost:8080/projet_web/index.php");
   exit;
  }
}
?>