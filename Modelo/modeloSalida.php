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
    }

?>