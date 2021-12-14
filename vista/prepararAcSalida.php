<?php
       require('../controlador/controladorSalida.php');
       $id=$_REQUEST['id'];
       $control = new controlSalida();
       $newval=$control->prepararActualizacionSalida($id);
       //echo $newval2=$newval['RUC'];
       //$control->datosActualizarIng();
?>