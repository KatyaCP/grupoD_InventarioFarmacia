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
    }

?>