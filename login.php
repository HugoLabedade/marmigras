<?php 
session_start();
include_once('config.php');
$query = $pdo->prepare("SELECT id_client, username_client, mdp_client FROM clients WHERE username_client = ('{$_POST['username']}')");
$query->execute();
$resultat = $query->fetch();


if($resultat == null){
  header("Location: http://localhost:8080/projet_web/index.php");
  exit;
}
$password = password_verify($_POST['password'], $resultat['mdp_client']);

if (!$resultat)
{
  header("Location: http://localhost:8080/projet_web/index.php");
  exit;
}
else
{
  if ($password) {
    $_SESSION['username_client'] = $resultat['username_client'];
    $_SESSION["id"] = $resultat["id_client"];
    header("Location: http://localhost:8080/projet_web/index2.php");
    exit;
  }
  else {
    header("Location: http://localhost:8080/projet_web/index.php");
   exit;
  }
}
?>