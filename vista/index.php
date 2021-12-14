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
    <title>Inico</title>
    <?php require('plantillaMenu.php'); ?>
    <style>
    body{
        background-image:url('fondo2.png');
    }
    body:before{
            content: "";
            width: 100%;
            height: 100%;
            background-color: rgba(8, 4, 5,0.5);
            position: absolute;
        }
        .div1{
            /*background-color: white;*/
            border-bottom: 4px solid #fff !important;
            padding-bottom: 0.5px;
        }
    </style>
</head>
<body onload="saludar();">
<script>
    function saludar(){
        alert('<?php echo "Bienvenido ".$varSesion ?>')
    }
</script>
    
</body>
</html>