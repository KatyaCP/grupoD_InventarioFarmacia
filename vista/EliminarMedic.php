<?php
       require('../controlador/controladorMedic.php');
       $id=$_REQUEST['id'];
       $control = new controlMedic();
       $control->eliminarMedicamento($id);
?>