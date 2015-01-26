<?php
include_once("config.php");
$clave=$_POST['clave_producto'];
$nombre=$_POST['nombre_producto'];
$descripcion=$_POST['descripcion_producto'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$consulta_insertar="INSERT INTO Productos
(clave_producto,nombre_producto,descripcion_producto,precio,categoria)
VALUES ('$clave','$nombre','$descripcion','$precio','$categoria')";
mysqli_query($conexion,$consulta_insertar);
?>