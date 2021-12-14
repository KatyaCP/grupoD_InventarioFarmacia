<?php
    require_once("../Modelo/modeloIngreso.php");
    require_once("../Modelo/mDetalleIngreso.php");
    require_once("conexion.php");
    class controlIngreso
    {
        //private $conexion;
        private $newIngre;
        private $newDetIng;
        public function __construct()
        {   
            $this->conexion = new Conexion();       
            $this->newIngre=new modeloIngreso($idIng=null,$idtraj=null,$idProv=null,$Nrolote=null,$fechaVen=null,$fechaIn=null,$estado=null,$motivo=null);
            $this->newDetIng=new mDetalleIngreso($idIng=null,$idMedic=null,$cant=null);
        }
        public function registrarNuevoIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo,$idMedic,$cant)
        {
            $nuevoIngreso = new modeloIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo);            
            $nuevoDetalleIngreso = new mDetalleIngreso($idIng,$idMedic,$cant);
            return $nuevoIngreso->registraIngreso($this->conexion)&&$nuevoDetalleIngreso->registraDetalleIngre($this->conexion);
        }
        //------------------------------------------------------
        public function listarIngres(){
            //$nuevoProveedor = new modeloProveedor($razonS=null,$ruc=null,$cel=null,$mail=null);   
            $datosIng= $this->newIngre->verIngreso($this->conexion);
            $newtwmp="";
            foreach($datosIng as $datos) {
                $prueba=$datos['IdIngreso'];
                $temp= "<td>".$datos['IdIngreso']."</td>"
                ."<td>".$datos['IdTrabaj']."</td>"
                ."<td>".$datos['IdProv']."</td>"
                ."<td>".$datos['NroLote']."</td>"
                ."<td>".$datos['fechaVenci']."</td>"
                ."<td>".$datos['FechaIngreso']."</td>"
                ."<td>".$datos['Estado']."</td>"
                ."<td>".$datos['MotivoIngreso']."</td>"
                ."<td>".$datos['Cantidad']."</td>"
                ."<td>".$datos['IdMedic']."</td>"
                ."<td>
                <a class='btn btn-secondary' href='prepararAcIngreso.php?id=$prueba'>Editar</a>&nbsp;&nbsp;
                <a class='btn btn-secondary' href='EliminarIngreso.php?id=$prueba' onclick='return confirmar()'>Eliminar</a>
                </td>"
                ."</tr>";
                $newtwmp.=$temp;
            }         
            return $newtwmp;  
        }
        public function eliminarIngreso($idingreso)
        {
            $this->newDetIng->deleteDetalleIngreso($this->conexion,$idingreso);
            $deleteIn = $this->newIngre->deleteIngreso($this->conexion,$idingreso);
            if($deleteIn==1)
            {
                header('Location:../vista/vistaIngreso.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
        }
        public function prepararActualizacionIngreso($idIngreso)
        {
            $prepararIn = $this->newIngre->prepareAcIn($this->conexion,$idIngreso);
            $prepararDetIn = $this->newDetIng->prepareAcDetIn($this->conexion,$idIngreso);
            session_start();
            $_SESSION['ingreso'] = $prepararIn;
            $_SESSION['detIngreso']=$prepararDetIn;
            return header('Location:../vista/ActualizarIngreso.php');
            
        }
        public function datosActualizarIng()
        {
            
            $prepararIng=$_SESSION['ingreso'];
            $prepararDetIng=$_SESSION['detIngreso'];
            ?>
            <form action="#" method="post">
            <div class="mb-3">
                <label class="form-label" for="">Codigo Medicamento</label>
                <input class="form-control" type="number" name="idmedic" value="<?php echo $prepararDetIng['IdMedic'] ?>" maxlength="5">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Proveedor</label>
                <input class="form-control" type="number" name="idprov" value="<?php echo $prepararIng['IdProv'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Trabajador</label>
                <input class="form-control" type="number" name="idtrabaj" value="<?php echo $prepararIng['IdTrabaj'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Codigo Ingreso</label>
                <input class="form-control" type="text" name="idingreso" value="<?php echo $prepararIng['IdIngreso'] ?>" maxlength="5" readonly>
            </div>             
            <div class="mb-3">
            <label class="form-label" for="">Número Lote</label>
            <input class="form-control" type="text" name="NroLote" value="<?php echo $prepararIng['NroLote'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Fecha Vencimiento</label>
            <input class="form-control" type="date" name="fechaVencimiento" value="<?php echo $prepararIng['fechaVenci'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Fecha Ingreso</label>
            <input class="form-control" type="text" name="fechaIngreso" value="<?php echo $prepararIng['FechaIngreso'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Estado</label>
            <input class="form-control" type="text" name="estado" value="<?php echo $prepararIng['Estado'] ?>">
            </div>
            <div class="mb-3" id="selectmotivo">
            <label class="form-label" for="">Motivo Ingreso</label>
            <input class="form-control" type="text" name="motivoI" value="<?php echo $prepararIng['MotivoIngreso'] ?>" id="otro">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Cantidad</label>
                <input class="form-control" type="number" name="cantidad" value="<?php echo $prepararDetIng['Cantidad'] ?>">
            </div>
            <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="ACTUALIZAR INGRESO">
            </div>
            </form>
            <?php
        }
        public function ActualizarIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo,$idMedic,$cant)
        {
            
            $nuevoIngreso = new modeloIngreso($idIng,$idtraj,$idProv,$Nrolote,$fechaVen,$fechaIn,$estado,$motivo);            
            $nuevoDetalleIngreso = new mDetalleIngreso($idIng,$idMedic,$cant); 
            $nuevoIngreso->actualizaIng($this->conexion,$idIng);       
            $respuestaIng=$nuevoDetalleIngreso->actualizaDetIng($this->conexion,$idIng);
            if($respuestaIng==1)
            {
               return header('Location:../vista/vistaIngreso.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
            //return header('Location:../vista/vistaProveedor.php');

        }
    }
?>