<?php
    require_once("../Modelo/modeloProveedor.php");
    class controlProveedor{
        private $conexion;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
        }
        
        public function registrarNuevoProveedor($razonS,$ruc,$cel,$mail)
        {
            $nuevoProveedor = new modeloProveedor($razonS,$ruc,$cel,$mail);            
            return $nuevoProveedor->registraProve($this->conexion);    
        }
    }
?>