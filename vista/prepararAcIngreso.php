<?php
       require('../controlador/controladorIngreso.php');
       $id=$_REQUEST['id'];
       $control = new controlIngreso();
       $newval=$control->prepararActualizacionIngreso($id);
       //echo $newval2=$newval['RUC'];
       $control->datosActualizarIng();
?>