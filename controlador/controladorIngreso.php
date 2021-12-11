<?php
    require_once("../Modelo/modeloIngreso.php");
    require_once("../Modelo/mDetalleIngreso.php");
    class controlIngreso
    {
        private $conexion;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
        }
        public function registrarNuevoIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo,$idMedic,$cant)
        {
            $nuevoIngreso = new modeloIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo);            
            $nuevoDetalleIngreso = new mDetalleIngreso($idIng,$idMedic,$cant);
            return $nuevoIngreso->registraIngreso($this->conexion)&&$nuevoDetalleIngreso->registraDetalleIngre($this->conexion);
        }
    }
?>