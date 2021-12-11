<?php
    class modeloProveedor
    {

        private $RazonSocial;
        private $RUC;
        private $Celular;
        private $Email;
        public function __construct($razonS,$ruc,$cel,$mail)
        {
            $this->RazonSocial=$razonS;
            $this->RUC=$ruc;
            $this->Celular=$cel;
            $this->Email=$mail;
        }      
        public function registraProve($conexion)
        {
            $sentencia = $conexion->prepare("INSERT INTO Tproveedor(RazonSocial,RUC,Celular,Email) VALUES (?,?,?,?)");
            $sentencia->bindParam(1,$this->RazonSocial);
            $sentencia->bindParam(2,$this->RUC);
            $sentencia->bindParam(3,$this->Celular);
            $sentencia->bindParam(4,$this->Email);
            if($sentencia->execute()){
                return "Registrado correctamente";
            }
            else return "problemas en el registro";
        }
    }

?>