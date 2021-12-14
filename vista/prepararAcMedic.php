<?php
       require('../controlador/controladorMedic.php');
       $id=$_REQUEST['id'];
       $control = new controlMedic();
       $newval=$control->prepararActualizacionMedicamento($id);
?>