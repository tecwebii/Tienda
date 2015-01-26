<?php
include_once("config.php");
$id=$_POST['id'];
$clave=$_POST['clave_producto'];
$nombre=$_POST['nombre_producto'];
$descripcion=$_POST['descripcion_producto'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$consulta_actualizar="UPDATE Productos SET clave_producto='$clave' WHERE id='$id'";
mysqli_query($conexion,$consulta_actualizar);
?>