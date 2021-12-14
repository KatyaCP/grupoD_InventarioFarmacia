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
    <title>Vista Salida</title>
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
    <br><br><br><br>
    <div  id="tabla">
    <table class="table table-dark table-striped m-4">
    <thead class="text-center">
    <tr>
    <th>Cod Salida</th>
    <th>Cod Trabajador Almacen</th>
    <th>Cod Trabajador Entrega</th>
    <th>Nro. Lote </th>
    <th>Fecha Salida</th>
    <th>Estado</th>
    <th>Motivo Salida</th>
    <th>Cod Medic</th>
    <th>Cantidad</th>
    <th>ACCION</th>
    </tr>
    </thead>
    <tbody class="text-center">
        <?php
       require('../controlador/controladorSalida.php');

       $control = new controlSalida();
       $datosIn=$control->listarSalida();
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