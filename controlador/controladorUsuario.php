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
                echo '¡El usuario no existe!';
                echo"<script>alert('Usuario o Contraseña no validos')</script>";
            }
        }
    }
?>