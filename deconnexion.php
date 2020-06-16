<?php session_start();
session_destroy();
header("Location: http://localhost:8080/projet_web/index.php");
exit;
?>