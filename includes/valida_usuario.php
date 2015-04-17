<?php
$usuario = $_POST['nombre_usuario'];
$password = md5($_POST['password_usuario']);

include_once("../admin/includes/config.php");
$consulta_usuario = "SELECT nombre_usuario, password_usuario, tipo_usuario FROM Usuarios WHERE nombre_usuario = '$usuario' AND password_usuario = '$password'";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);
$total_usuarios = mysqli_num_rows($resultado_usuario);
$row = mysqli_fetch_assoc($resultado_usuario);
if ($total_usuarios > 0){
session_start();
 $_SESSION["nombre_usuario"] = $usuario;
 $_SESSION["tipo_usuario"] = $row['tipo_usuario'];
 header('Location: ../');
} else{
	?>
	<script>
	alert("Usuario ó Contraseña Incorrecta");
	location.href = "../";
	</script>
	<?php
}
?>