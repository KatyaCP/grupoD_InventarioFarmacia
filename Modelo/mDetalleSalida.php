<?php
    class mDetalleSalida{
        
        private $idSalida;
        private $idMedicamento;
        private $Cantidad;
        public function __construct($idSalid,$idMedic,$cant)
        {
            $this->idSalida=$idSalid;
            $this->idMedicamento=$idMedic;
            $this->Cantidad=$cant;
        }      
        public function registraDetalleSalid($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO TdetalleSalida (IdSalida,IdMedic,Cantidad) VALUES (?,?,?)");
            $sentencia->bindParam(1,$this->idSalida);
            $sentencia->bindParam(2,$this->idMedicamento);
            $sentencia->bindParam(3,$this->Cantidad);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
    }

?>