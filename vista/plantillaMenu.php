<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

  
    <title></title>
    <style>
    
        .header{
            width: 100%;
            height: 70px;
            background-color: rgba(8, 4, 5,0.5);
            font-family: 'Times New Roman', Times, serif;
            position: fixed;
            top: 0;left: 0;
            
        }
       
        .container{
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }
        .container .menu{
            /*float: left;
            line-height: 100px;*/
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .container .menu a{
            display: block;
            padding-left:  15px;
            padding-right: 15px;
            margin-top: 14px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
            font-size: 25px;
          
        }
        .container .menu a:hover{
            background-color: #630866;
            border-bottom: 4px solid #fff;
            padding-bottom: 5px;
        }

        .container .menu ul{
            list-style: none;
            display: flex;
            justify-content: space-between;
        }
        .container .menu ul li ul{
         
            display: flex;
            flex-direction: column;
            position: absolute;
            background-color: #D29BFD;
            padding: 0px;
            margin: 0px;
        }
        .container .menu ul li ul li{
            width: 240px;
            position: relative;
        }
        .container .menu ul li ul{
            display: none;

        }
        .container .menu ul li:hover>ul{
            display: block;
        }
     
    
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <div class="padre">
    <header class="header">
        <div class="container">
            <nav class="menu">
            <ul class="ul">
                <li><a href="index.php"><div class="div1">Inicio</div></a></li>
                <li>
                    <a href="#"><div class="div2">Proveedor </div></a>
                    <ul>
                        <li><a href="vistaProveedor.php"><div class="div3">Consultar</div></a></li>
                        <li><a href="registrarProveedor.php"><div class="div4">Registrar</div></a></li>                      
                    </ul>
                </li>
                <li>
                    <a href="vistaMedic.php"><div class="div5">Ver Medicamento</div></a>
                    <ul>
                        <li><a href="vistaIngreso.php"><div class="div6">Ingreso</div></a></li>
                        <li><a href="vistaSalida.php"><div class="div7">Salida</div></a></li> 
                        <li><a href="vistaStock.php"><div class="div8">Stock</div></a></li>                   
                    </ul>
                </li>
                <li>
                    <a href="registrarMedic"><div class="div9">Registrar Medicamento</div></a>
                    <ul>
                        <li><a href="registrarIngresoM.php"><div class="div10">Ingreso</div></a></li>
                        <li><a href="registrarSalidaM"><div class="div11">Salida</div></a></li>                    
                    </ul>
                </li>
                <li><a href="cerrarSecion"><div class="div12">Cerrar Sesión</div></a></li>
            </ul> 
            </nav>
        </div>

 
    </header>
    </div>
<br><br>

</body>