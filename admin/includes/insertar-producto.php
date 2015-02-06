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

$archivos_permitidos= array('image/jpeg','image/jpg','image/pjpeg','image/gif','image/png','image/x-png');

if (in_array($tipo_archivo,$archivos_permitidos)){
	$nombre_final_archivo= date('His') . "_" . $nombre_archivo;
	
move_uploaded_file($tmp_archivo, $directorio_archivos . $nombre_final_archivo);

$imagen_o = imagecreatefromgif($directorio_archivos . $nombre_final_archivo);

$directorio_thumb = "../img/portadas/thumbs/";
$nombre_final_thumb = $directorio_thumb . $nombre_final_archivo;

$width=300;
$height=300;

$width_o = imagesx($imagen_o);
$height_o = imagesy($imagen_o);

$proporcion = $width_o/$height_o;
if ($width/$height > $proporcion){
	$width = $height * $proporcion;
} else{
	$height = $width/$proporcion;
}

$imagen_t = imagecreatetruecolor($width,$height);

imagecopyresampled($imagen_t, $imagen_o, 0,0,0,0, $width, $height, $width_o, $height_o);
imagejpeg($imagen_t,$nombre_final_thumb,90);

$consulta_insertar="INSERT INTO Productos
(clave_producto,nombre_producto,descripcion_producto,imagen_producto,precio,categoria,fecha_lanzamiento)
VALUES ('$clave','$nombre','$descripcion','$nombre_final_archivo','$precio','$categoria','$fecha')";
mysqli_query($conexion,$consulta_insertar);
} else{
	echo "El tipo de archivo no es permitido, sólo puedes subir .jpg, .gif ó .png";
}
header('Location:../index.php');
?>