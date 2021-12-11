<?php
    require_once("../Modelo/modeloMedic.php");
    class controlMedic
    {
        private $conexion;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
        }
       
        public function registrarNuevoMedicamento($nombre,$tipo,$descrip,$Marca)
        {
     
            $nuevoMedicamento = new modeloMedicamento($nombre,$tipo,$descrip,$Marca);            
            return $nuevoMedicamento->registraMedic($this->conexion);
            
        }
    }
?>