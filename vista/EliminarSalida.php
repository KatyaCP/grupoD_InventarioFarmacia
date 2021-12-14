<?php
       require('../controlador/controladorSalida.php');
       $id=$_REQUEST['id'];
       $control = new controlSalida();
       $control->eliminarSalida($id);
?>