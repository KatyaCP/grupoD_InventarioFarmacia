<?php
    require_once("../Modelo/modeloProveedor.php");
    class controlProveedor
    {
        private $conexion;
        private $newProv;
        public function __construct()
        {            
            $this->conexion= new PDO("mysql:host=localhost;dbname=BdFarmaciaAzul;port=3306","root", "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,]);
            $this->newProv=new modeloProveedor($razonS=null,$ruc=null,$cel=null,$mail=null);
        }
        
        public function registrarNuevoProveedor($razonS,$ruc,$cel,$mail)
        {
            $nuevoProveedor = new modeloProveedor($razonS,$ruc,$cel,$mail);            
            return $nuevoProveedor->registraProve($this->conexion);    
        }
       
        public function listarProveedor(){
            //$nuevoProveedor = new modeloProveedor($razonS=null,$ruc=null,$cel=null,$mail=null);   
            $datosProv= $this->newProv->verProveedor($this->conexion);
            $newtwmp="";
            foreach($datosProv as $datos) {
                $prueba=$datos['IdProv'];
                $temp= "<td>".$datos['IdProv']."</td>"
                ."<td>".$datos['RazonSocial']."</td>"
                ."<td>".$datos['RUC']."</td>"
                ."<td>".$datos['Celular']."</td>"
                ."<td>".$datos['Email']."</td>"
                ."<td>
                <a class='btn btn-secondary' href='prepararAcProv.php?id=$prueba'>Editar</a>&nbsp;&nbsp;
                <a class='btn btn-secondary' href='EliminarProveedor.php?id=$prueba' onclick='return confirmar()'>Eliminar</a>
                </td>"
                ."</tr>";
                $newtwmp.=$temp;
            }         
            return $newtwmp;  
        }
        public function eliminarProveedor($idProveedor)
        {
            $deleteProv = $this->newProv->deleteProv($this->conexion,$idProveedor);
            if($deleteProv==1)
            {
                header('Location:../vista/vistaProveedor.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
        }
        public function prepararActualizacionProveedor($idProveedor)
        {
            $prepararProv = $this->newProv->prepareAcProv($this->conexion,$idProveedor);
            session_start();
            $_SESSION['prov'] = $prepararProv;
            return header('Location:../vista/ActualizarProveedor.php?res=$prepararProv');
            
        }
        public function datosActualizarProv()
        {
            
            $prepararProv=$_SESSION['prov'];
            ?>
            <form action="#" method="post">
            <div class="mb-3">
            <label class="form-label" for="">Razon Social:</label>
            <input class="form-control" type="text" name="razonSocial" value="<?php echo $prepararProv['RazonSocial'] ?>">
            </div>         
            <div class="mb-3">
            <label class="form-label" for="">RUC</label>
            <input class="form-control" type="text" name="ruc" value="<?php echo $prepararProv['RUC'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Nuenero de Celular</label>
            <input class="form-control" type="number" name="celular" value="<?php echo $prepararProv['Celular'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="">Correo Electrónico</label>
            <input class="form-control" type="text" name="email" value="<?php echo $prepararProv['Email'] ?>">
            </div>
            <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="ACTUALIZAR PROVEEDOR">
            </div>
            </form>
            <?php
        }
        public function ActualizarProveedor($razonS,$ruc,$cel,$mail)
        {
            $actuProv=$_SESSION['prov'];
            $actuProvID=$actuProv['IdProv'];
            $nuevoProveedor = new modeloProveedor($razonS,$ruc,$cel,$mail);            
            $respuestaProv=$nuevoProveedor->actualizaProvee($this->conexion,$actuProvID);
            if($respuestaProv==1)
            {
               return header('Location:../vista/vistaProveedor.php');
            }
            else echo"<script>alert('Error al momento de eliminar, intentelo de nuevo')</script>";
            //return header('Location:../vista/vistaProveedor.php');

        }
    }
?>