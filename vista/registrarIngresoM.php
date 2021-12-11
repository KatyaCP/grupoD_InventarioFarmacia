
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingreso Medicamento</title>
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
        .div9,.div10{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
        .principal{
            position: fixed;
            z-index: 1;
            top: 50px;left: 50px;
            /*display: none;*/
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
<h1>REGISTRAR INGRESO MEDICAMENTO</h1>
<form action="#" method="post">
<div class="mb-3">
    <label class="form-label" for="">Codigo Medicamento</label>
    <input class="form-control" type="number" name="idmedic" value="" maxlength="5">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Proveedor</label>
    <input class="form-control" type="number" name="idprov" value="">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Trabajador</label>
    <input class="form-control" type="number" name="idtrabaj" value="">
</div>
<div class="mb-3">
    <label class="form-label" for="">Codigo Ingreso</label>
    <input class="form-control" type="text" name="idingreso" value="" maxlength="5">
</div>             
<div class="mb-3">
<label class="form-label" for="">Número Lote</label>
<input class="form-control" type="text" name="NroLote" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Fecha Vencimiento</label>
<input class="form-control" type="date" name="fechaVencimiento" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Fecha Ingreso</label>
<input class="form-control" type="date" name="fechaIngreso" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Hora Ingreso</label>
<input class="form-control" type="time" name="horaIngreso" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Estado</label>
<input class="form-control" type="text" name="estado" value="">
</div>
<div class="mb-3">
<label class="form-label" for="">Motivo del Ingreso</label>
<select class="form-select" name="motivoI"  onchange="convertir(this)" id="motivoI">
    <option value="Compra">Por Compra</option>
    <option value="Garantia">Por Garantia</option>
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
                document.getElementById('otro').name="motivoI";
            }
            else 
            {
                document.getElementById('selectmotivo').style.display="none";
                nombreInput.name="motivoI";
                document.getElementById('otro').name="espera";
            }
            
        }
</script>
</body>
</html>
<?php
require('../controlador/controladorIngreso.php');

$control = new controlIngreso();
if(isset($_POST["idmedic"]) && isset($_POST["idprov"])&& isset($_POST["idtrabaj"])&& isset($_POST["idingreso"])&&isset($_POST["NroLote"]) && isset($_POST["fechaVencimiento"])&& isset($_POST["fechaIngreso"])&& isset($_POST["horaIngreso"])&& isset($_POST["estado"])&& isset($_POST["motivoI"])&& isset($_POST["cantidad"]))
{
    $idIng = $_POST["idingreso"];
    $idtraj = $_POST["idtrabaj"];
    $idProv = $_POST["idprov"];
    $Nrolote = $_POST["NroLote"];
    $fechaVen= $_POST["fechaVencimiento"];
    $fechaIn= $_POST["fechaIngreso"]." ".$_POST["horaIngreso"];
    $estado= $_POST["estado"];
    $motivo= $_POST["motivoI"];
    $idMedic= $_POST["idmedic"];
    $cant= $_POST["cantidad"];
    $control->registrarNuevoIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo,$idMedic,$cant);
    
}
?>


    

    


