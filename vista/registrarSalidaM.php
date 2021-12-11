
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salida Medicamento</title>
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
        .div9,.div11{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
        .principal{
            position: fixed;
            z-index: 1;
            top: 50px;left: 50px;
        }
        .header{
            background-color: #D29BFD !important;
            z-index: 100;
        }
        #selectmotivo{
            display: none;
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
<h1>REGISTRAR SALIDA MEDICAMENTO</h1>
<form action="#" method="post">
<div class="mb-3">
    <label class="form-label" for="">Codigo Medicamento</label>
    <input class="form-control" type="number" name="idmedic" value="" maxlength="5">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Trabajador Encargado Almacen</label>
    <input class="form-control" type="number" name="idtrabajAl" value="">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Trabajador a Entregar</label>
    <input class="form-control" type="number" name="idtrabajEn" value="">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Salida</label>
    <input class="form-control" type="text" name="idsalida" value="" maxlength="5">
</div>             
<div class="mb-3">
<label class="form-label" for="">Número Lote</label>
<input class="form-control" type="text" name="NroLote" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Fecha Salida</label>
<input class="form-control" type="date" name="fechaSalida" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Hora Salida</label>
<input class="form-control" type="time" name="horaSalida" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Estado</label>
<input class="form-control" type="text" name="estado" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Motivo de la Salida</label>
<select class="form-select" name="motivoS"  onchange="convertir(this)" id="motivoS">
    <option value="solicitud">Por solicitud de un trabajador</option>
    <option value="Devolucion">Por devolucion</option>
    <option value="Otro">Otros</option>
</select>
<div class="mb-3" id="selectmotivo">
<label class="form-label" for="">Especifique el motivo</label>
<input class="form-control" type="text" name="espera2" value="" id="otro">
</div>
</div>
<div class="mb-3">
    <label class="form-label" for="">Cantidad</label>
    <input class="form-control" type="number" name="cantidad" value="">
</div>
<div class="mb-3">
<input class="btn btn-primary" type="submit" value="REGISTRAR">
</div>
</div>
</form>
</div>


<script>
    function convertir(nombreInput)
        {
            if(nombreInput.value=="Otro")
            {
                document.getElementById('selectmotivo').style.display="block";
                document.getElementById('otro').focus();
                document.getElementById('otro').style.background="plum";
                document.getElementById('otro').style.color="white";
                nombreInput.name="espera";
                document.getElementById('otro').name="motivoS";
            }
            else 
            {
                document.getElementById('selectmotivo').style.display="none";
                nombreInput.name="motivoS";
                document.getElementById('otro').name="espera";
            }
            
        }
</script>
</body>
</html>
<?php
require('../controlador/controladorSalida.php');

$control = new controlSalida();
if(isset($_POST["idmedic"]) && isset($_POST["idtrabajAl"])&& isset($_POST["idtrabajEn"])&& isset($_POST["idsalida"])&&isset($_POST["NroLote"]) && isset($_POST["fechaSalida"])&& isset($_POST["horaSalida"])&& isset($_POST["estado"])&& isset($_POST["motivoS"])&& isset($_POST["cantidad"]))
{
    $idsalid = $_POST["idsalida"];
    $idtrajAl = $_POST["idtrabajAl"];
    $idtrajEnt = $_POST["idtrabajEn"];
    $Nrolote = $_POST["NroLote"];
    $fecha= $_POST["fechaSalida"]." ".$_POST["horaSalida"];
    $estado= $_POST["estado"];
    $motivoS= $_POST["motivoS"];
    $idMedic= $_POST["idmedic"];
    $cant= $_POST["cantidad"];
    $control->registrarNuevaSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS,$idMedic,$cant);
    
}
?>