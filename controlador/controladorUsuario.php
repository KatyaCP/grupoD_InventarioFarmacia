<?php
    require_once("../Modelo/modeloUsuario.php");
    class controlUsuario
    {
        private $conexion;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
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