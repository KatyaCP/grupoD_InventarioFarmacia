<?php
    require_once("../Modelo/modeloMedic.php");
    class controlMedic
    {
        private $conexion;
        private $newMedic;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
            $this->newMedic=new modeloMedicamento($nombre=null,$tipo=null,$descrip=null,$Marca=null);
        }
       
        public function registrarNuevoMedicamento($nombre,$tipo,$descrip,$Marca)
        {
     
            $nuevoMedicamento = new modeloMedicamento($nombre,$tipo,$descrip,$Marca);            
            return $nuevoMedicamento->registraMedic($this->conexion);
            
        }
        public function listarMedicamento(){
              
            $datosMedic= $this->newMedic->verMedic($this->conexion);
            $newtwmp="";
            foreach($datosMedic as $datos) {
                $prueba=$datos['IdMedic'];
                $temp= "<td>".$datos['IdMedic']."</td>"
                ."<td>".$datos['NombreMedic']."</td>"
                ."<td>".$datos['TipoMedic']."</td>"
                ."<td>".$datos['Descripcion']."</td>"
                ."<td>".$datos['Marca']."</td>"
                ."<td>
                <a class='btn btn-secondary' href='prepararAcMedic.php?id=$prueba'>Editar</a>&nbsp;&nbsp;
                <a class='btn btn-secondary' href='EliminarMedic.php?id=$prueba' onclick='return confirmar()'>Eliminar</a>
                </td>"
                ."</tr>";
                $newtwmp.=$temp;
            }         
            return $newtwmp;  
        }
        public function eliminarMedicamento($idMedic)
        {
            $deleteMedic = $this->newMedic->deleteMedic($this->conexion,$idMedic);
            if($deleteMedic==1)
            {
                header('Location:../vista/vistaMedic.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
        }
        public function prepararActualizacionMedicamento($idMedic)
        {
            $prepararMedic = $this->newMedic->prepareAcMedic($this->conexion,$idMedic);
            session_start();
            $_SESSION['medic'] = $prepararMedic;
            return header('Location:../vista/ActualizarMedicamento.php');
            
        }
        public function datosActualizarMedic()
        {
            
            $prepararMedic=$_SESSION['medic'];
            ?>
            <form action="#" method="post">
            <div class="mb-3">
            <label class="form-label" for="">Nombre Medicamento:</label>
            <input class="form-control" type="text" name="medicamento" value="<?php echo $prepararMedic['NombreMedic'] ?>">
            </div> 
            <div class="mb-3" id="selectOtro">
            <label class="form-label" for="">Tipo Medicamento</label>
            <input class="form-control" type="text" name="tipoMedic" value="<?php echo $prepararMedic['TipoMedic'] ?>" id="otro">
            </div>           
            <div class="mb-3">
            <label class="form-label" for="">Descripcion</label>
            <input class="form-control" type="text" name="Descripcion" value="<?php echo $prepararMedic['Descripcion'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Marca</label>
            <input class="form-control" type="text" name="marca" value="<?php echo $prepararMedic['Marca'] ?>">
            </div>
            <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="ACTUALIZAR MEDICAMENTO">
            </div>
            </form>
            <?php
        }
        public function ActualizarMedicamento($nombre,$tipo,$descrip,$Marca)
        {
            $actuMedic=$_SESSION['medic'];
            $actuMedicID=$actuMedic['IdMedic'];
            $nuevoMedicamento = new modeloMedicamento($nombre,$tipo,$descrip,$Marca);            
            $respuestaMedic=$nuevoMedicamento->actualizaMedic($this->conexion,$actuMedicID);
            if($respuestaMedic==1)
            {
               return header('Location:../vista/vistaMedic.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
        }
        public function listarStock()
        {             
            $datosMedic= $this->newMedic->verStock($this->conexion);
            $newtwmp="";
            foreach($datosMedic as $datos) {
                //$prueba=$datos['IdMedic'];
                $temp= "<td>".$datos['IdMedic']."</td>"
                ."<td>".$datos['NombreMedic']."</td>"
                ."<td>".$datos['TipoMedic']."</td>"
                ."<td>".$datos['Marca']."</td>"
                ."<td>".$datos['stock']."</td>"
                ."<td>".$datos['Descripcion']."</td>"
                ."</tr>";
                $newtwmp.=$temp;
            }         
            return $newtwmp;  
        }
    }
?>