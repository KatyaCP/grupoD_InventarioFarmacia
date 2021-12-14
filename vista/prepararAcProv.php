<?php
       require('../controlador/controladorProveedor.php');
       $id=$_REQUEST['id'];
       $control = new controlProveedor();
       $newval=$control->prepararActualizacionProveedor($id);
       echo $newval2=$newval['RUC'];
       $control->datosActualizarProv();
?>