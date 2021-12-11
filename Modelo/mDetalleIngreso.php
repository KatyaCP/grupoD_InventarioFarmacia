<?php
    class mDetalleIngreso{
        
        private $idIngreso;
        private $idMedicamento;
        private $Cantidad;
        public function __construct($idIn,$idMedic,$cant)
        {
            $this->idIngreso=$idIn;
            $this->idMedicamento=$idMedic;
            $this->Cantidad=$cant;
        }      
        public function registraDetalleIngre($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO TdetalleIngreso (IdIngreso,IdMedic,Cantidad) VALUES (?,?,?)");
            $sentencia->bindParam(1,$this->idIngreso);
            $sentencia->bindParam(2,$this->idMedicamento);
            $sentencia->bindParam(3,$this->Cantidad);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
    }

?>