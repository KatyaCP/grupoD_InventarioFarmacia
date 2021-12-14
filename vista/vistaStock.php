<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else $varSesion=$_SESSION['almacenero'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vista Stock</title>
    <?php
    require('plantillaMenu.php');
    ?>
    <style>
        #tabla{
            max-width: 1400px;
            margin-left: 50px;
            margin-right: auto;
        }
        .div5,.div6{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
    </style>
</head>
<body>
    <h1>Vista Stock Medicamento</h1>
    <br><br><br><br>
    <div  id="tabla">
    <table class="table table-dark table-striped m-4">
    <thead class="text-center">
    <tr>
    <th>Cod Medicamento</th>
    <th>Nombre Medicamento</th>
    <th>Tipo Medicamento</th>
    <th>Marca</th>
    <th>Stock</th>
    <th>Descripcion</th>
    </tr>
    </thead>
    <tbody class="text-center">
        <?php
       require('../controlador/controladorMedic.php');

       $control = new controlMedic();
       $datosIn=$control->listarStock();
       echo $datosIn;
        ?>
    </tbody>
    </table>
    </div>
    
</body>
</html>