<?php
$usuario = $_POST['nombre_usuario'];
$password = md5($_POST['password_usuario']);

include_once("config.php");
$consulta_usuario = "SELECT nombre_usuario, password_usuario, tipo_usuario FROM Usuarios WHERE nombre_usuario = '$usuario' AND password_usuario = '$password' AND tipo_usuario = 2";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);
$total_usuarios = mysqli_num_rows($resultado_usuario);
$row = mysqli_fetch_assoc($resultado_usuario);
if ($total_usuarios > 0){
session_start();
 $_SESSION["usuario_admin"] = $usuario;
 header('Location: ../index.php');
} else{
	?>
	<script>
	alert("Usuario ó Contraseña Incorrecta ó no tiene permiso de ingresar a esta parte del sitio");
	location.href = "../login_admin.php";
	</script>
	<?php
}
?>