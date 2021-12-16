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
    <title>Registrar Proveedor</title>
    
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
        .div2,.div4{
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
<img src="proveedor.png">
</div>
</div>
<div class="container" style="width: 40%; float:right">
    <br>
    <br>
    <h1>REGISTRAR PROVEEDOR</h1>
    <br><br>
    <form action="#" method="post">
    <div class="mb-3">
    <label class="form-label" for="">Razon Social:</label>
    <input class="form-control" type="text" name="razonSocial" value="">
    </div>         
    <div class="mb-3">
    <label class="form-label" for="">RUC</label>
    <input class="form-control" type="text" name="ruc" value="">
    </div>
    <div class="mb-3">
    <label class="form-label" for="">Nuenero de Celular</label>
    <input class="form-control" type="number" name="celular" value="">
    </div>
    <div class="mb-3">
    <label class="form-label" for="">Correo Electrónico</label>
    <input class="form-control" type="text" name="email" value="">
    </div>
    <div class="mb-3">
    <input class="btn btn-primary" type="submit" value="REGISTRAR PROVEEDOR">
    </div>
    </form>
</div>
</body>
</html>

<?php
require('../controlador/controladorProveedor.php');

$control = new controlProveedor();


if(isset($_POST["razonSocial"]) && isset($_POST["ruc"])&& isset($_POST["celular"])&& isset($_POST["email"]))
{
    $razonS = $_POST["razonSocial"];
    $ruc = $_POST["ruc"];
    $cel = $_POST["celular"];
    $mail = $_POST["email"];
    
    $control->registrarNuevoProveedor($razonS,$ruc,$cel,$mail);
    
}
?>

    

    


