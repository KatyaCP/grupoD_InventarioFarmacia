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
        body{
            background-image:url('medi.jpg');
        }
        
        /*body:before{
            content: "";
            width: 100%;
            height: 100%;
            background-color: rgba(10, 31, 100,0.2);;
            position: absolute;
        }*/
        #tabla{
            max-width: 1400px;
            display: flex;
            margin-left: auto;
            margin-right: auto;
        }
        .div5,.div8{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }

        h1{
            text-align: center;
            color: black;
        }
        .header{
            background-color: #D29BFD !important;
            z-index: 100;
        }

    </style>
</head>
<body>
    <h1><br>Vista Stock Medicamento</h1>
    
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