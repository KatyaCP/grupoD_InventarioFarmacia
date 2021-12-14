<?php
       require('../controlador/controladorProveedor.php');
       $id=$_REQUEST['id'];
       $control = new controlProveedor();
       $control->eliminarProveedor($id);
?>