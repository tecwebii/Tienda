<?php
ob_start();
session_start();
$carro = $_SESSION['carro'];
$id = $_GET['id'];
unset($carro[$id]);
$_SESSION['carro'] =  $carro;
header("Location: ../ver_carrito.php");
ob_end_flush();
?>