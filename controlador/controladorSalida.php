<?php
    require_once("../Modelo/modeloSalida.php");
    require_once("../Modelo/mDetalleSalida.php");
    require_once("conexion.php");
    class controlSalida
    {
        private $conexion;
        private $newSalida;
        private $newDetSalida;
        public function __construct()
        {            
            $this->conexion = new Conexion();
                $this->newSalida=new modeloSalida($idsalid=null,$idtrajAl=null,$idtrajEnt=null,$Nrolote=null,$fecha=null,$estado=null,$motivoS=null);
                $this->newDetSalida=new mDetalleSalida($idsalid=null,$idMedic=null,$cant=null);
        }
       
        public function registrarNuevaSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS,$idMedic,$cant)
        {        
            $nuevaSalida = new modeloSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS);            
            $nuevoDetalleSalida = new mDetalleSalida($idsalid,$idMedic,$cant);
            return $nuevaSalida->registraSalida($this->conexion)&&$nuevoDetalleSalida->registraDetalleSalid($this->conexion);   
        }
        public function listarSalida(){
            //$nuevoProveedor = new modeloProveedor($razonS=null,$ruc=null,$cel=null,$mail=null);   
            $datosSalid= $this->newSalida->verSalida($this->conexion);
            $newtwmp="";
            foreach($datosSalid as $datos) {
                $prueba=$datos['IdSalida'];
                $temp= "<td>".$datos['IdSalida']."</td>"
                ."<td>".$datos['IdTrabajAlmacen']."</td>"
                ."<td>".$datos['IdTrabaj']."</td>"
                ."<td>".$datos['NroLote']."</td>"
                ."<td>".$datos['FechaSalida']."</td>"
                ."<td>".$datos['estado']."</td>"
                ."<td>".$datos['MotivoSalida']."</td>"      
                ."<td>".$datos['IdMedic']."</td>"
                ."<td>".$datos['Cantidad']."</td>"
                ."<td>
                <a class='btn btn-secondary' href='prepararAcSalida.php?id=$prueba'>Editar</a>&nbsp;&nbsp;
                <a class='btn btn-secondary' href='EliminarSalida.php?id=$prueba' onclick='return confirmar()'>Eliminar</a>
                </td>"
                ."</tr>";
                $newtwmp.=$temp;
            }         
            return $newtwmp;  
        }
        public function eliminarSalida($idSalida)
        {
            $this->newDetSalida->deleteDetalleSalida($this->conexion,$idSalida);
            $deleteSalid = $this->newSalida->deleteSalida($this->conexion,$idSalida);
            if($deleteSalid==1)
            {
                header('Location:../vista/vistaSalida.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
        }
        public function prepararActualizacionSalida($idSalida)
        {
            $prepararSalid = $this->newSalida->prepareAcSalic($this->conexion,$idSalida);
            $prepararDetSalid = $this->newDetSalida->prepareAcDetSalid($this->conexion,$idSalida);
            session_start();
            $_SESSION['salida'] = $prepararSalid;
            $_SESSION['detSalida']=$prepararDetSalid;
            return header('Location:../vista/ActualizarSalida.php');
            
        }
        public function datosActualizarSalid()
        {
            
            $prepararSalid=$_SESSION['salida'];
            $prepararDetSalid=$_SESSION['detSalida'];
            ?>
           <form action="#" method="post">
            <div class="mb-3">
                <label class="form-label" for="">Codigo Medicamento</label>
                <input class="form-control" type="number" name="idmedic" value="<?php echo $prepararDetSalid['IdMedic'] ?>" maxlength="5">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Trabajador Encargado Almacen</label>
                <input class="form-control" type="number" name="idtrabajAl" value="<?php echo $prepararSalid['IdTrabajAlmacen'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Trabajador a Entregar</label>
                <input class="form-control" type="number" name="idtrabajEn" value="<?php echo $prepararSalid['IdTrabaj'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Salida</label>
                <input class="form-control" type="text" name="idsalida" value="<?php echo $prepararSalid['IdSalida'] ?>" maxlength="5" readonly>
            </div>             
            <div class="mb-3">
            <label class="form-label" for="">Número Lote</label>
            <input class="form-control" type="text" name="NroLote" value="<?php echo $prepararSalid['NroLote'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Fecha Salida</label>
            <input class="form-control" type="text" name="fechaSalida" value="<?php echo $prepararSalid['FechaSalida'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">R.S</label>
            <input class="form-control" type="text" name="estado" value="<?php echo $prepararSalid['estado'] ?>">
            </div>
            <div class="mb-3" id="selectmotivo">
            <label class="form-label" for="">Motivo Salida</label>
            <input class="form-control" type="text" name="motivoS" value="<?php echo $prepararSalid['MotivoSalida'] ?>" id="otro">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Cantidad</label>
                <input class="form-control" type="number" name="cantidad" value="<?php echo $prepararDetSalid['Cantidad'] ?>">
            </div>
            <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="ACTUALIZAR SALIDA">
            </div>
            </form>
            <?php
        }
        public function ActualizarSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS,$idMedic,$cant)
        {
            
            $nuevaSalida = new modeloSalida($idsalid,$idtrajAl,$idtrajEnt,$Nrolote,$fecha,$estado,$motivoS);            
            $nuevoDetalleSalida = new mDetalleSalida($idsalid,$idMedic,$cant);
            $nuevaSalida->actualizaSalid($this->conexion,$idsalid);       
            $respuestaIng=$nuevoDetalleSalida->actualizaDetSalid($this->conexion,$idsalid);
            if($respuestaIng==1)
            {
               return header('Location:../vista/vistaSalida.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
            //return header('Location:../vista/vistaProveedor.php');

        }
    }
?>