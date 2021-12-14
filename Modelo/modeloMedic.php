<?php
    class modeloMedicamento{
        
        private $nombreM;
        private $tipoM;
        private $descripcion;
        private $marca;
        public function __construct($nombre,$tipo,$descrip,$Marca)
        {
            $this->nombreM=$nombre;
            $this->tipoM=$tipo;
            $this->descripcion=$descrip;
            $this->marca=$Marca;
        }      
        public function registraMedic($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO Tmedicamento(NombreMedic,TipoMedic,Descripcion,Marca) VALUES (?,?,?,?)");
            $sentencia->bindParam(1,$this->nombreM);
            $sentencia->bindParam(2,$this->tipoM);
            $sentencia->bindParam(3,$this->descripcion);
            $sentencia->bindParam(4,$this->marca);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
        public function verMedic($conexion)
        {
            $resultado=$conexion->prepare("SELECT * FROM Tmedicamento");
            $resultado->execute();
            $listMedic=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listMedic;
        }
        public function deleteMedic($conexion,$idMedic)
        {
            $sentencia=$conexion->prepare("CALL Eliminar_Medicamento(?)");
            $sentencia->bindParam(1,$idMedic);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcMedic($conexion,$idMedic){
            $resultado=$conexion->prepare("SELECT * FROM Tmedicamento where IdMedic=?; ");
            $resultado->bindParam(1,$idMedic);
            $resultado->execute();
            $listMedic=$resultado->fetch();
            return $listMedic;
        }
        public function actualizaMedic($conexion,$idMedic)
        {
            $sentencia = $conexion->prepare("UPDATE Tmedicamento SET NombreMedic=?,TipoMedic=?,Descripcion=?,Marca=? WHERE IdMedic=?");
            $sentencia->bindParam(1,$this->nombreM);
            $sentencia->bindParam(2,$this->tipoM);
            $sentencia->bindParam(3,$this->descripcion);
            $sentencia->bindParam(4,$this->marca);
            $sentencia->bindParam(5,$idMedic);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        /************************************************ */
        public function verStock($conexion)
        {
            $resultado=$conexion->prepare("SELECT m.IdMedic,m.NombreMedic,m.TipoMedic,m.Marca,SUM(E.Cantidad) - IFNULL(SUM(S.Cantidad), 0) as stock,m.Descripcion  
            FROM tmedicamento m LEFT JOIN Tdetalleingreso E ON 
            m.IdMedic = E.IdMedic LEFT JOIN Tdetallesalida S ON 
            m.IdMedic = S.IdMedic GROUP BY E.IdMedic;");
            $resultado->execute();
            $listMedic=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listMedic;
        }
    }

?>