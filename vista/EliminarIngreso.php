<?php
       require('../controlador/controladorIngreso.php');
       $id=$_REQUEST['id'];
       $control = new controlIngreso();
       $control->eliminarIngreso($id);
?>