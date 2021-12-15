<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else $varSesion=$_SESSION['almacenero'];
require('../controlador/controladorSalida.php');

$control = new controlSalida();

if(isset($_POST["idmedic"]) && isset($_POST["idtrabajAl"])&& isset($_POST["idtrabajEn"])&& isset($_POST["idsalida"])&&isset($_POST["NroLote"]) && isset($_POST["fechaSalida"])&& isset($_POST["estado"])&& isset($_POST["motivoS"])&& isset($_POST["cantidad"]))
{
    $idsalid = $_POST["idsalida"];
    $idtrajAl = $_POST["idtrabajAl"];
    $idtrajEnt = $_POST["idtrabajEn"];
    $Nrolote = $_POST["NroLote"];
    $fecha= $_POST["fechaSalida"];
    $estado= $_POST["estado"];
    $motivoS= $_POST["motivoS"];
    $idMedic= $_POST["idmedic"];
    $cant= $_POST["cantidad"];
    $control->ActualizarSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS,$idMedic,$cant);  
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Salida</title>
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
        .div5,.div7{
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
    <h1>ACTUALIZAR SALIDA</h1>
    <?php
    $control->datosActualizarSalid();
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

    

    


