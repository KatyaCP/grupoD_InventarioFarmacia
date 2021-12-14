<?php
    class modeloIngreso{
        
        private $idIngreso;
        private $idTrabajador;
        private $idProveedor;
        private $numLote;
        private $fechaVencimiento;
        private $fechaIngreso;
        private $Estado;
        private $motivoIngreso;
      
        public function __construct($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo)
        {
            $this->idIngreso=$idIng;
            $this->idTrabajador=$idtraj;
            $this->idProveedor=$idProv;
            $this->numLote=$Nrolote;
            $this->fechaVencimiento=$fechaVen;
            $this->fechaIngreso=$fechaIn;
            $this->Estado=$estado;
            $this->motivoIngreso=$motivo;
        }      
        public function registraIngreso($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO TingresoMedic (IdIngreso,IdTrabaj,IdProv,NroLote,fechaVenci,FechaIngreso,Estado,MotivoIngreso)VALUES (?,?,?,?,?,?,?,?)");
            $sentencia->bindParam(1,$this->idIngreso);
            $sentencia->bindParam(2,$this->idTrabajador);
            $sentencia->bindParam(3,$this->idProveedor);
            $sentencia->bindParam(4,$this->numLote);
            $sentencia->bindParam(5,$this->fechaVencimiento);
            $sentencia->bindParam(6,$this->fechaIngreso);
            $sentencia->bindParam(7,$this->Estado);
            $sentencia->bindParam(8,$this->motivoIngreso);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
        public function verIngreso($conexion)
        {
            $resultado=$conexion->prepare("SELECT i.*,di.Cantidad,di.IdMedic FROM tingresomedic i INNER JOIN tdetalleingreso di ON i.IdIngreso=di.IdIngreso");
            $resultado->execute();
            $listIngreso=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listIngreso;
        }
        public function deleteIngreso($conexion,$idIngreso)
        {
            $sentencia=$conexion->prepare("DELETE FROM Tingresomedic where IdIngreso=?;");
            $sentencia->bindParam(1,$idIngreso);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcIn($conexion,$idIngreso){
            $resultado=$conexion->prepare("SELECT * FROM Tingresomedic where IdIngreso=?; ");
            $resultado->bindParam(1,$idIngreso);
            $resultado->execute();
            $listIngreso=$resultado->fetch();
            return $listIngreso;
        }
        public function actualizaIng($conexion,$idIngreso)
        {
            $sentencia = $conexion->prepare("UPDATE Tingresomedic SET IdTrabaj=?,IdProv=?,NroLote=?,fechaVenci=?,FechaIngreso=?,Estado=?,MotivoIngreso=? WHERE IdIngreso=?");           
            $sentencia->bindParam(1,$this->idTrabajador);
            $sentencia->bindParam(2,$this->idProveedor);
            $sentencia->bindParam(3,$this->numLote);
            $sentencia->bindParam(4,$this->fechaVencimiento);
            $sentencia->bindParam(5,$this->fechaIngreso);
            $sentencia->bindParam(6,$this->Estado);
            $sentencia->bindParam(7,$this->motivoIngreso);
            $sentencia->bindParam(8,$idIngreso);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
    }

?>