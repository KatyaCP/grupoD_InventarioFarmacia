<?php
class modeloUsuario
    {   
        public function validarConsulta($conexion,$user,$pass)
        {
            $idCargo=1;
            $sentencia = $conexion->prepare("SELECT * FROM Tusuario tu INNER JOIN Ttrabajador tr ON tu.IdTrabaj=tr.IdTrabaj where tr.IdCargo=? and tu.usuario=? AND tu.contrasena=aes_encrypt(?,'admin') ");
            $sentencia->bindParam(1,$idCargo);
            $sentencia->bindParam(2,$user);  
            $sentencia->bindParam(3,$pass);
            $sentencia->execute();
            while($sentencia->fetch()){
                return 1;
            }
            return 0;
        }
    }
?>
