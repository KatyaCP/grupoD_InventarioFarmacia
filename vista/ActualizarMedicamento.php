<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else $varSesion=$_SESSION['almacenero'];
require('../controlador/controladorMedic.php');

$control = new controlMedic();
if(isset($_POST["medicamento"]) && isset($_POST["tipoMedic"])&& isset($_POST["Descripcion"])&& isset($_POST["marca"]))
{
    $nombre = $_POST["medicamento"];
    $tipo = $_POST["tipoMedic"];
    $descrip = $_POST["Descripcion"];
    $Marca = $_POST["marca"];
    $control->ActualizarMedicamento($nombre,$tipo,$descrip,$Marca);
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Medicamento</title>
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
<img src="logo2.png">
</div>
</div>
<div class="container" style="width: 40%; float:right">
    <br>
    <br>
    <h1>ACTUALIZAR MEDICAMENTO</h1>
    <br>
    <br>
    <?php
    $control->datosActualizarMedic();
    ?>
</div>
</body>
</html>


    

    


