<?php
//INICIAMOS EL ALMACENAMIENTO EN CACHÉ
ob_start();
//INCLUIMOS LA CONEXIÓN A LA BASE DE DATOS
include_once("config.php");
//CAPTURAMOS LOS VALORES ENVIADOS A TRAVÉS DEL FORMULARIO EN "NUEVO-PRODUCTO.PHP"
$clave=htmlspecialchars($_POST['clave_producto']);
$nombre=htmlspecialchars($_POST['nombre_producto']);
$descripcion=htmlspecialchars($_POST['descripcion_producto']);
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
//echo $categoria[2];
$fecha=$_POST['fecha_lanzamiento'];

//CAPTURAMOS LA INFORMACIÓN DE LA IMAGEN SUBIDA POR EL USUARIO
$nombre_archivo=$_FILES['imagen_producto']['name'];
$tipo_archivo=$_FILES['imagen_producto']['type'];
$tmp_archivo=$_FILES['imagen_producto']['tmp_name'];
//DEFINIMOS LA RUTA A DONDE SE SUBIRÁN LAS IMÁGENES
$directorio_archivos="../img/portadas/";

//DEFINIMOS LOS TIPOS DE ARCHIVO PERMITIDOS
$archivos_permitidos= array('image/jpeg','image/jpg','image/pjpeg','image/gif','image/png','image/x-png');

// VERIFICAMOS. SI EL TIPO DE ARCHIVO COINCIDE CON ALGUNO DE LOS DEL ARREGLO ENTONCES SUBE LA IMAGEN Y CREA EL THUMB 
if (in_array($tipo_archivo,$archivos_permitidos)){
	//AÑADIMOS AL NOMBRE DE ARCHIVO LA HORA-MINUTO-SEGUNDO
	$nombre_final_archivo= date('His') . "_" . $nombre_archivo;
	//SUBIMOS EL ARCHIVO DE SU ESPACIO TEMPORAL AL DIRECTORIO QUE DEFINIMOS ANTERIORMENTE
	move_uploaded_file($tmp_archivo, $directorio_archivos . $nombre_final_archivo);
	
	//LEEMOS EL ARCHIVO QUE ACABAMOS DE SUBIR Y APARTIR DEL CUAL SE CREARÁ UN THUMB
	$imagen_o = imagecreatefromjpeg($directorio_archivos . $nombre_final_archivo);
	
	//DEFINIMOS EL DIRECTORIO PARA GUARDAR LOS THUMB
	$directorio_thumb = "../img/portadas/thumbs/";
	//AÑADIMOS A LA RUTA EL NOMBRE FINAL DEL ARCHIVO (CON LA HORA-MINUTO-SEGUNDO)
	$nombre_final_thumb = $directorio_thumb . $nombre_final_archivo;

	//DEFINIMOS LAS MEDIDAS DEL THUMB
	$width=300;
	$height=300;

	//CAPTURAMOS LAS MEDIDAS EN PIXELES DE LA IMAGEN ORIGINAL
	$width_o = imagesx($imagen_o);
	$height_o = imagesy($imagen_o);

	//REALIZAMOS UNA OPERACIÓN PARA DETERMINAR LA PROPORCIÓN Y EL FORMATO DE LA IMAGEN
	$proporcion = $width_o/$height_o;
	//SI LA DIVISIÓN DE LA ANCHURA ENTRE LA ALTURA DE LA IMAGEN ES MAYOR A LA PROPORCIÓN ENTONCES ES UNA 	IMAGEN VERTICAL
if ($width/$height > $proporcion){
	//POR LO TANTO RECALCULAMOS EL TAMAÑO DE LA ANCHURA DEL THUMB
	$width = $height * $proporcion;
} else{
	//SI NO ENTONCES ES HORIZONTAL Y RECALCULAMOS LA ALTURA
	$height = $width/$proporcion;
}

	// DEFINIMOS LAS PROPIEDADES DEL THUMB
	$imagen_t = imagecreatetruecolor($width,$height);

	// ESCRIBIMOS EL THUMB A PARTIR DE LA INFORMACIÓN DE LA IMAGEN ORIGINAL
	imagecopyresampled($imagen_t, $imagen_o, 0,0,0,0, $width, $height, $width_o, $height_o);
	// GUARDAMOS LA IMAGEN EN LA RUTA ANTERIORMENTE DEFINIDA CON UNA CALIDAD DEL 90%
	imagejpeg($imagen_t,$nombre_final_thumb,90);

	// DEFINIMOS LA CONSULTA DE PARA INSERTAR LA INFORMACIÓN INGRESADA POR EL USUARIO
$consulta_insertar="INSERT INTO Productos (clave_producto,nombre_producto,descripcion_producto,imagen_producto,precio,fecha_lanzamiento) VALUES ('$clave','$nombre','$descripcion','$nombre_final_archivo','$precio','$fecha')";
// EJECUTAMOS LA CONSULTA
mysqli_query($conexion,$consulta_insertar);

$total_categorias = count($categoria)-1;
$id_nuevo_producto = mysqli_insert_id($conexion);

for ($i=0; $i<=$total_categorias; $i++){
mysqli_query($conexion,"INSERT INTO Relacion_producto_categoria (id_categoria,id_producto) VALUES ('$categoria[$i]', '$id_nuevo_producto')");
}

} else{
	// SI EL FORMATO NO ESTA ENTRE LOS PERMITIDOS LE MOSTRAMOS UN ECHO AL USUARIO
	echo "El tipo de archivo no es permitido, sólo puedes subir .jpg, .gif ó .png";
}
//AL TERMINAR LOS PROCESOS, MANDAMOS DE REGRESO AL INDEX
//header('Location:../index.php');
//LIBERAMOS CACHÉ DE LA PÁGINA
ob_end_flush();
?>