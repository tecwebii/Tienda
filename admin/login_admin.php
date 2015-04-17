<?php
session_start();
//if (!isset($_SESSION['nombre_usuario'])){
?>	
<form action='includes/valida_usuario.php' method='POST'>
<label for='nombre_usuario'> Nombre de usuario</label><br>
<input type="text" name="nombre_usuario" id="nombre_usuario"><br><br>
<label for='password_usuario'> Contraseña</label><br><br>
<input type="password" name="password_usuario" id="password_usuario"><br><br>
<input type="submit" name="submit" value="Entrar" id="submit">
</form>
<br>
<?php
//} else {
echo "Bienvenido " . $_SESSION["usuario_admin"];
//echo "<a href='includes/logout.php'>Cerrar Sesión </a>";
//}
?>