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
    <title>Vista Medicamentos</title>
    <?php
    require('plantillaMenu.php');
    ?>
    <style>
         body{
            background-image:url('medi.jpg');
        }
        #tabla{
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
        }
        .div5,.div6{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
        h1{
            text-align: center;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }
        .header{
            background-color: #D29BFD !important;
            z-index: 100;
        }
    </style>
</head>
<body>
    <h1><br>Vista Ingreso de Medicamentos</h1>
    
    <div  id="tabla">
    <table class="table table-dark table-striped m-4">
    <thead class="text-center">
    <tr>
    <th>Cod Ingreso</th>
    <th>Cod Trabajador</th>
    <th>Cod Proveedor</th>
    <th>Nro. Lote </th>
    <th>Fecha Vencimiento</th>
    <th>Fecha Ingreso</th>
    <th>R.S</th>
    <th>Motivo</th>
    <th>Cantidad</th>
    <th>Cod Medic</th>
    <th>ACCION</th>
    </tr>
    </thead>
    <tbody class="text-center">
        <?php
       require('../controlador/controladorIngreso.php');

       $control = new controlIngreso();
       $datosIn=$control->listarIngres();
       echo $datosIn;
        ?>
    </tbody>
    </table>
    </div>
    <script>
        function confirmar(id){
            let respuesta=confirm('¿Estas seguro que deseas eliminar?');
            if(respuesta==true){
                return true;
            }else return false;
        }
    </script>
</body>
</html>