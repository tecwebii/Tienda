<?php
include_once("config.php");
$id=$_GET['id'];

$consulta= "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

while ($row= mysqli_fetch_assoc($resultado)){
	$imagen= $row['imagen_producto'];
}

unlink("../img/portadas/" . $imagen);
unlink("../img/portadas/thumbs/" . $imagen);

$consulta_eliminar= "DELETE FROM productos WHERE id = $id";
mysqli($conexion, $consulta_eliminar);

header("Location:../index.php");
?>