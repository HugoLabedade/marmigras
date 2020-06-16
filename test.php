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

<body>
  <div class="container shoe">
    <div class="productImage shoeImg"></div>
        <div class="size shoeSize">
            <h4>SIZE</h4>
                <ul>
                    <li>9</li>
                    <li>8</li>
                    <li>7</li>
                </ul>
        </div>
    <div class="price shoePrice">
      <h4>PRICE</h4>
      <span>$150</span>
    </div>
    <div class="color shoeColor">
        <h4>COLORS</h4>
            <ul>
                <li><span class="blue"></span></li>
                <li><span class="yellow"></span></li>
                <li><span class="red"></span></li>
            </ul>
    </div>
    <div class="productName shoeName">
        Nike Air Max
    </div>
  </div>


