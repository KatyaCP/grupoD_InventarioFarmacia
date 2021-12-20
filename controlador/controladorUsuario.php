<?php
    require_once("../Modelo/modeloUsuario.php");
    require_once("conexion.php");
    class controlUsuario
    {
        private $conexion;
        public function __construct()
        {            
            $this->conexion = new Conexion();
        }
       
        public function consultarUsuario($user,$pass)
        {
            $nuevaConsulta = new modeloUsuario(); 
            $respuestaConsulta=$nuevaConsulta->validarConsulta($this->conexion,$user,$pass);  
            if($respuestaConsulta==1)
            {
                session_start();
                $_SESSION['almacenero']=$user;
                header('Location:../vista');
            }
            else {
               /* echo '¡El usuario no existe!';
                /*echo"<script>alert('Usuario o Contraseña no validos')</script>";*/
                
                echo '<div class="prin" id="desHabilitar">';
                echo'<div class="mensaje" id="mensaj">';
                 echo'<div class="image"><img src="iconLogin2.gif"  width="200px"></div>';
                echo'<div class="sms">';
                        
                        echo'<div class="user">Error <br>Contraseña o Usuario Incorecto</div><br>';
                        echo'<button class="BTNaceptar" onclick="cerrarMensaje()">ACEPTAR</button>';
                    echo'</div>';
                echo'</div>';
                echo'</div>';
            }
        }
    }
?>