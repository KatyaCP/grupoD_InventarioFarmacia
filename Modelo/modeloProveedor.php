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
        //
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
        //
        public function verProveedor($conexion)
        {
            $resultado=$conexion->prepare("SELECT * FROM Tproveedor");
            $resultado->execute();
            $listProveedor=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listProveedor;
        }
        public function deleteProv($conexion,$idProveedor)
        {
            $sentencia=$conexion->prepare("DELETE FROM Tproveedor where IdProv=?;");
            $sentencia->bindParam(1,$idProveedor);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
        public function prepareAcProv($conexion,$idProveedor){
            $resultado=$conexion->prepare("SELECT * FROM Tproveedor where IdProv=?; ");
            $resultado->bindParam(1,$idProveedor);
            $resultado->execute();
            $listProveedor=$resultado->fetch();
            return $listProveedor;
        }
        public function actualizaProvee($conexion,$idProveedor)
        {
            $sentencia = $conexion->prepare("UPDATE Tproveedor SET RazonSocial=?,RUC=?,Celular=?,Email=? WHERE IdProv=?");
            $sentencia->bindParam(1,$this->RazonSocial);
            $sentencia->bindParam(2,$this->RUC);
            $sentencia->bindParam(3,$this->Celular);
            $sentencia->bindParam(4,$this->Email);
            $sentencia->bindParam(5,$idProveedor);
            if($sentencia->execute()){
                return 1;
            }
            else return 0;
        }
    }

?>