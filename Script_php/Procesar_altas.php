<?php

    include('CuentaDAO.php');

    //Validación de datos

    $n = $_POST['caja_nombre'];
    $ap = $_POST['caja_apellido'];
    $correo = $_POST['caja_Correo'];
    $contra = $_POST['caja_contraseña'];
    $d = $_POST['caja_direccion'];
    $c = $_POST['caja_ciudad'];
    $e = $_POST['caja_estado'];
    $zip = $_POST['caja_zip'];
    $DAO = new CuentaDAO();

    $DAO->AgregarCuentaNueva($n, $ap, $correo, $contra, $d, $c, $e, $zip);

?>