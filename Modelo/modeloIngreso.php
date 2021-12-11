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
    }

?>