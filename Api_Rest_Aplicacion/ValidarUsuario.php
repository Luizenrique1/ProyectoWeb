<?php
    include 'Conect.php';
    $us_correo=$_POST['correo'];
    $us_contra=$_POST['contra'];
    $correo=sha1($us_correo);
    $contra=sha1($us_contra);    
    $sentencia=$conexion->prepare("SELECT * FROM CUENTA WHERE correo=? AND contraseña=?");
    
    $sentencia->bind_param('ss', $correo, $contra);
    $sentencia->execute();

    $resultado=$sentencia->get_result();
    if($fila=$resultado->fetch_assoc()){
            echo json_encode($fila,JSON_UNESCAPED_UNICODE);
    }
    $sentencia->close();
    $conexion->close();

?>