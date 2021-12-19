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
    <title>Vista Proveedor</title>
    <?php
    require('plantillaMenu.php');
    ?>
    <style>
         body{
            background-image:url('fondo2.png');
        }
        #tabla{
            margin-left: auto;
            margin-right: auto;
        }
        .div2,.div3{
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
        .header{
            background-color: #D29BFD !important;
            z-index: 100;
        }
        h1{
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <br><br><h1>Vista Proveedor</h1>
    <div class="col-md-9" id="tabla">
    <table class="table table-dark table-striped m-4">
    <thead class="text-center">
    <tr>
    <th>Codigo Proveedor</th>
    <th>Razon Social</th>
    <th>RUC</th>
    <th>Nro. Celular </th>
    <th>Correo Electronico</th>
    <th>ACCION</th>
    </tr>
    </thead>
    <tbody class="text-center">
        <?php
       require('../controlador/controladorProveedor.php');

       $control = new controlProveedor();
       $datosProv=$control->listarProveedor();
       echo $datosProv;
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