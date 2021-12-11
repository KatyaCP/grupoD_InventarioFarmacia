<?php
    require_once("../Modelo/modeloSalida.php");
    require_once("../Modelo/mDetalleSalida.php");
    class controlSalida
    {
        private $conexion;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
        }
       
        public function registrarNuevaSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS,$idMedic,$cant)
        {        
            $nuevaSalida = new modeloSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS);            
            $nuevoDetalleSalida = new mDetalleSalida($idsalid,$idMedic,$cant);
            return $nuevaSalida->registraSalida($this->conexion)&&$nuevoDetalleSalida->registraDetalleSalid($this->conexion);   
        }
    }
?>