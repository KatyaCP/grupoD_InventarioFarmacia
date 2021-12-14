<?php
    class modeloSalida{

        private $idSalida;
        private $idTrabajadorAlmacen;
        private $idtrajadorEntrega;
        private $numLote;
        private $fechaSalida;
        private $Estado;
        private $motivoSalida;
        public function __construct($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS)
        {
            $this->idSalida=$idsalid;
            $this->idTrabajadorAlmacen=$idtrajAl;
            $this->idtrajadorEntrega=$idtrajEnt;
            $this->numLote=$Nrolote;
            $this->fechaSalida=$fecha;
            $this->Estado=$estado;
            $this->motivoSalida=$motivoS;
        }      
        public function registraSalida($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO TsalidaMedic(IdSalida,IdTrabajAlmacen,IdTrabaj,NroLote,FechaSalida,estado,MotivoSalida) VALUES (?,?,?,?,?,?,?)");
            $sentencia->bindParam(1,$this->idSalida);
            $sentencia->bindParam(2,$this->idTrabajadorAlmacen);
            $sentencia->bindParam(3,$this->idtrajadorEntrega);
            $sentencia->bindParam(4,$this->numLote);
            $sentencia->bindParam(5,$this->fechaSalida);
            $sentencia->bindParam(6,$this->Estado);
            $sentencia->bindParam(7,$this->motivoSalida);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
        public function verSalida($conexion)
        {
            $resultado=$conexion->prepare("SELECT s.*,ds.Cantidad,ds.IdMedic FROM tsalidamedic s INNER JOIN tdetallesalida ds ON s.IdSalida=ds.IdSalida");
            $resultado->execute();
            $listIngreso=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listIngreso;
        }
        public function deleteSalida($conexion,$idSalida)
        {
            $sentencia=$conexion->prepare("DELETE FROM Tsalidamedic where IdSalida=?;");
            $sentencia->bindParam(1,$idSalida);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcSalic($conexion,$idSalida){
            $resultado=$conexion->prepare("SELECT * FROM Tsalidamedic where IdSalida=?; ");
            $resultado->bindParam(1,$idSalida);
            $resultado->execute();
            $listSalida=$resultado->fetch();
            return $listSalida;
        }
        public function actualizaSalid($conexion,$idSalida)
        {
            $sentencia = $conexion->prepare("UPDATE Tsalidamedic SET IdTrabajAlmacen=?,IdTrabaj=?,NroLote=?,FechaSalida=?,estado=?,MotivoSalida=? WHERE IdSalida=?");           
            $sentencia->bindParam(1,$this->idTrabajadorAlmacen);
            $sentencia->bindParam(2,$this->idtrajadorEntrega);
            $sentencia->bindParam(3,$this->numLote);
            $sentencia->bindParam(4,$this->fechaSalida);
            $sentencia->bindParam(5,$this->Estado);
            $sentencia->bindParam(6,$this->motivoSalida);
            $sentencia->bindParam(7,$idSalida);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
    }

?>