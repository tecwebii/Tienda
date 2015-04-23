<?php
session_start();
include_once("../admin/includes/config.php");

if (isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id=$_GET['id'];
}

$consulta_producto = "SELECT * FROM productos WHERE id = '$id'";
$resultado_producto = mysqli_query($conexion,$consulta_producto);
$row = mysqli_fetch_assoc($resultado_producto);

if (isset($_POST['cantidad'])){
$cantidad = $_POST['cantidad'];
}else{
	$cantidad = 1;
}

if(isset($_SESSION['carro'])){
	$carro=$_SESSION['carro'];
}

$carro[$id]= array('id' => $row['id'],
	'nombre_producto' => $row['nombre_producto'],
	'clave_producto' => $row['clave_producto'],
	'cantidad' => $cantidad,
	'precio' => $row['precio']);

$_SESSION['carro'] = $carro;

//echo $carro[$id]['precio'];
//print_r($carro);
header("Location:../ver_carrito.php");

?>