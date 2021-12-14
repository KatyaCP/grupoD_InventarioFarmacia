<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else $varSesion=$_SESSION['almacenero'];
require('../controlador/controladorProveedor.php');

$control = new controlProveedor();
if(isset($_POST["razonSocial"]) && isset($_POST["ruc"])&& isset($_POST["celular"])&& isset($_POST["email"]))
{
    $razonS = $_POST["razonSocial"];
    $ruc = $_POST["ruc"];
    $cel = $_POST["celular"];
    $mail = $_POST["email"];
    $control->ActualizarProveedor($razonS,$ruc,$cel,$mail);
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Proveedor</title>
    <?php
    require('plantillaMenu.php');
    ?>
    <style>
        body{
            background-color: rgb(255, 255, 255);
        }
        h1{
            text-align: center;
            color: rgb(181, 10, 187);
            font-family: 'Times New Roman', Times, serif;
        }
        .div2,.div3{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
        .principal{
            position: fixed;
            z-index: 1;
            top: 50px;left: 30px;
        }
        .header{
            background-color: #D29BFD !important;
            z-index: 100;
        }
    </style>
</head>
<body>
<div class="principal" style="max-width: 1400px; margin: auto;">
<div class="imag" style="width: 60%; float:left" >
<br><br>
<img src="proveedor.png">
</div>
</div>
<div class="container" style="width: 40%; float:right">
    <br>
    <br>
    <h1>ACTUALIZAR PROVEEDOR</h1>
    <?php
    $control->datosActualizarProv();
    ?>
</div>
</body>
</html>
<?php
/*
if(isset($_POST["razonSocial"]) && isset($_POST["ruc"])&& isset($_POST["celular"])&& isset($_POST["email"]))
{
    $razonS = $_POST["razonSocial"];
    $ruc = $_POST["ruc"];
    $cel = $_POST["celular"];
    $mail = $_POST["email"];
    $control->ActualizarProveedor($razonS,$ruc,$cel,$mail);
    
}*/
?>

    

    


