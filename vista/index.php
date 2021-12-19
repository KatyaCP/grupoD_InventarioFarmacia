<?php
session_start();
if(!isset($_SESSION['almacenero']))
{
    header("location:inicioSesion.php");
    die();
}
else 
{
    $varSesion=$_SESSION['almacenero'];
    
    if( isset( $_SESSION['contador'] ) ) {
        $_SESSION['contador'] += 1;
    }else {
        $_SESSION['contador'] = 1;
    }
    $contar=$_SESSION['contador'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inico</title>
    <style>
        .prin{
            position: absolute;
            width: 100%;
            height: 100px;
            z-index: 100;
            top: 0;
            background-color: none;
            display: none;
            
        }
    .mensaje{
        position: fixed;
        max-width: 500px;
        left: 33%;
        z-index: 200;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: black;/* */
        top: 3px;
        height: 300px;
        border-radius: 20px;
        font-family: 'Times New Roman', Times, serif;
        
        
    }
    .image{
        position: relative;
        width: 60%;
        top: 20px;
        left: -50px;
    }
    .sms {
        position: relative;
        width: 40%;
        top: 60px;
        left: -60px;
    }
    .user{
        position: relative;
        top: -5px;
        left: -65px;
        font-size: 40px;
        color: rgb(101, 168, 255);
    }
    .bienvenida{
        font-size: 50px;
        color: darkorchid;
    }
    .BTNaceptar{
        position: relative;
        top: 25px;
        left: -60px;
        background-color: darkorchid;
        color: white;
        font-size: 20px;
        padding: 10px;
        width: 300px;
        border: none;
        border-radius: 10px;
        transition-duration: 0.8s;
    }
    .BTNaceptar:hover{
        background-color: rgb(237, 71, 252);
        transform: scale(1.1);
    }
    </style>
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
<body onload="saludar(<?php echo $contar ?>);">
<div class="prin" id="desHabilitar">
<div class="mensaje" id="mensaj">
    <div class="image"><img src="iconUser.png"  width="350px"></div>
    <div class="sms">
        <!--Bienvenida-->
        <label class="bienvenida"><b>Bienvenido</b> </label><br>
        <label class="user"><?php echo $varSesion ?></label><br>
        <button class="BTNaceptar" onclick="cerrarMensaje()">ACEPTAR</button>
    </div>
</div>
</div>
<script>
    function saludar(contar)
    {       
        if(contar==1)
        {
            document.getElementById('desHabilitar').style.display="block";
        }
    }
    function cerrarMensaje()
    {
        document.getElementById('desHabilitar').style.display="none";
    }
</script>
    
</body>
</html>

