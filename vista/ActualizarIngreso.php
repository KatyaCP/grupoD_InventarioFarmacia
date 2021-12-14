<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else $varSesion=$_SESSION['almacenero'];
require('../controlador/controladorIngreso.php');

$control = new controlIngreso();
if(isset($_POST["idmedic"]) && isset($_POST["idprov"])&& isset($_POST["idtrabaj"])&& isset($_POST["idingreso"])&&isset($_POST["NroLote"]) && isset($_POST["fechaVencimiento"])&& isset($_POST["fechaIngreso"])&& isset($_POST["estado"])&& isset($_POST["motivoI"])&& isset($_POST["cantidad"]))
{
    $idIng = $_POST["idingreso"];
    $idtraj = $_POST["idtrabaj"];
    $idProv = $_POST["idprov"];
    $Nrolote = $_POST["NroLote"];
    $fechaVen= $_POST["fechaVencimiento"];
    $fechaIn= $_POST["fechaIngreso"];
    $estado= $_POST["estado"];
    $motivo= $_POST["motivoI"];
    $idMedic= $_POST["idmedic"];
    $cant= $_POST["cantidad"];
    $control->ActualizarIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo,$idMedic,$cant);
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Ingreso</title>
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
    <h1>ACTUALIZAR INGRESO</h1>
    <?php
    $control->datosActualizarIng();
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

    

    


