
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Medicamento</title>
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
        .div9{
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
        #selectOtro{
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
    <br>
    <h1>REGISTRAR MEDICAMENTO</h1>
    <form action="#" method="post">
    <div class="mb-3">
    <label class="form-label" for="">Nombre Medicamento:</label>
    <input class="form-control" type="text" name="medicamento" value="">
    </div>
    <div class="mb-3">
    <label class="form-label" for="">Tipo Medicamento</label>
    <select class="form-select" name="tipoMedic" onchange="convertir(this)">
        <option value="tableta">Tableta</option>
        <option value="inyectable">Inyectable</option>
        <option value="jarabe">Jarabe</option>
        <option value="Otro">Otro</option>
    </select>
    </div>  
    <div class="mb-3" id="selectOtro">
    <label class="form-label" for="">Especifique El tipo</label>
    <input class="form-control" type="text" name="espera" value="" id="otro">
    </div>           
    <div class="mb-3">
    <label class="form-label" for="">Descripcion</label>
    <input class="form-control" type="text" name="Descripcion" value="">
    </div>
    <div class="mb-3">
    <label class="form-label" for="">Marca</label>
    <input class="form-control" type="text" name="marca" value="">
    </div>
    <div class="mb-3">
    <input class="btn btn-primary" type="submit" value="REGISTRAR MEDICAMENTO">
    </div>
    </form>
</div>
<script>
    function convertir(nombreInput)
        {
            if(nombreInput.value=="Otro")
            {
                document.getElementById('selectOtro').style.display="block";
                document.getElementById('otro').focus();
                document.getElementById('otro').style.background="plum";
                document.getElementById('otro').style.color="white";
                /*document.getElementById('otro').style.background="gainsboro";
                document.getElementById('otro').style.color="rgb(188, 77, 231)";*/
                nombreInput.name="espera";
                document.getElementById('otro').name="tipoMedic";
            }
            else 
            {
                document.getElementById('selectOtro').style.display="none";
                nombreInput.name="tipoMedic";
                document.getElementById('otro').name="espera";
            }
            
        }
</script>
</body>
</html>
<?php
require('../controlador/controladorMedic.php');

$control = new controlMedic();
if(isset($_POST["medicamento"]) && isset($_POST["tipoMedic"])&& isset($_POST["Descripcion"])&& isset($_POST["marca"]))
{
    $nombre = $_POST["medicamento"];
    $tipo = $_POST["tipoMedic"];
    $descrip = $_POST["Descripcion"];
    $Marca = $_POST["marca"];
    $control->registrarNuevoMedicamento($nombre,$tipo,$descrip,$Marca);
    
}
?>

    

    


