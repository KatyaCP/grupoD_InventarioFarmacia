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
        public function deleteDetalleIngreso($conexion,$idIngreso)
        {
            $sentencia=$conexion->prepare("DELETE FROM Tdetalleingreso where IdIngreso=?;");
            $sentencia->bindParam(1,$idIngreso);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcDetIn($conexion,$idIngreso){
            $resultado=$conexion->prepare("SELECT * FROM Tdetalleingreso where IdIngreso=?; ");
            $resultado->bindParam(1,$idIngreso);
            $resultado->execute();
            $listIngreso=$resultado->fetch();
            return $listIngreso;
        }
        public function actualizaDetIng($conexion,$idIngreso)
        {
            $sentencia = $conexion->prepare("UPDATE Tdetalleingreso SET IdMedic=?,Cantidad=? WHERE IdIngreso=?");           
            $sentencia->bindParam(1,$this->idMedicamento);
            $sentencia->bindParam(2,$this->Cantidad);
            $sentencia->bindParam(3,$idIngreso);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
    }

?>