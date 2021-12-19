<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="estiloLogin.css">
</head>
<body>
    <div class="contenedor_div animate-bg">
        <form action="inicioSesion.php" method="POST">
        <div class="foundation"><br><img src="Foundation.png" width="100"></div>
        <h1>ECONOFARM</h1><br>
        <label class="label">Usuario:</label><br>
        <p><input type="text" placeholder="Escriba Nombre de Usuario" name="user"></p>
        <br>
        <label class="label">Contraseña:</label><br>
        <p><input type="password" placeholder="Escriba su Contraseña" name="pass"></p>
        <br>
        <input class="btnIngresar" type="submit" value="INGRESAR">
        </form>
    </div>    
</body>
</html>
<?php
require('../controlador/controladorUsuario.php');

$control = new controlUsuario();
if(isset($_POST["user"]) && isset($_POST["pass"]))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $control->consultarUsuario($user,$pass);
    
}
/*echo"<footer>";
echo "<h2>¡El usuario no existe!</h2>";
echo"</footer>";*/
?>


