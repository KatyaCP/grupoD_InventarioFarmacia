<?php
    class modeloUsuario
    {   
        public function validarConsulta($conexion,$user,$pass)
        {
            
            $idtrabajo=1;
            $sentencia = $conexion->prepare("SELECT * FROM Tusuario where IdTrabaj=? and usuario=? AND contrasena=aes_encrypt(?,'admin') ");
            $sentencia->bindParam(1,$idtrabajo);
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