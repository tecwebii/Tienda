<?php
include_once("config.php");
$clave=$_POST['clave_producto'];
$nombre=$_POST['nombre_producto'];
$descripcion=$_POST['descripcion_producto'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$fecha=$_POST['fecha_lanzamiento'];

echo $nombre_archivo=$_FILES['imagen_producto']['name'];
echo $tipo_archivo=$_FILES['imagen_producto']['type'];
echo $tmp_archivo=$_FILES['imagen_producto']['tmp_name'];
$directorio_archivos="../img/portadas/";

move_uploaded_file($tmp_archivo, $directorio_archivos . $nombre_archivo);

$consulta_insertar="INSERT INTO Productos
(clave_producto,nombre_producto,descripcion_producto,imagen_producto,precio,categoria,fecha_lanzamiento)
VALUES ('$clave','$nombre','$descripcion','$nombre_archivo','$precio','$categoria','$fecha')";
mysqli_query($conexion,$consulta_insertar);
?>