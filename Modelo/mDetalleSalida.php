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
        public function deleteDetalleSalida($conexion,$idSalida)
        {
            $sentencia=$conexion->prepare("DELETE FROM Tdetallesalida where IdSalida=?;");
            $sentencia->bindParam(1,$idSalida);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcDetSalid($conexion,$idSalida){
            $resultado=$conexion->prepare("SELECT * FROM Tdetallesalida where IdSalida=?; ");
            $resultado->bindParam(1,$idSalida);
            $resultado->execute();
            $listSalida=$resultado->fetch();
            return $listSalida;
        }
        public function actualizaDetSalid($conexion,$idSalida)
        {
            $sentencia = $conexion->prepare("UPDATE Tdetallesalida SET IdMedic=?,Cantidad=? WHERE IdSalida=?");           
            $sentencia->bindParam(1,$this->idMedicamento);
            $sentencia->bindParam(2,$this->Cantidad);
            $sentencia->bindParam(3,$idSalida);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
    }

?>