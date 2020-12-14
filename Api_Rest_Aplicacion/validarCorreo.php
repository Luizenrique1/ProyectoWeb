<?php
    include 'Conect.php';
    $us_correo=$_POST['correo'];
    
    //$us_correo="c@g.com";
    //$us_contra="123";
    $correo=sha1($us_correo);   
    $sentencia=$conexion->prepare("SELECT * FROM CUENTA WHERE correo=?");
    
    $sentencia->bind_param('s', $correo);
    $sentencia->execute();

    $resultado=$sentencia->get_result();
    if($fila=$resultado->fetch_assoc()){
            echo json_encode($fila,JSON_UNESCAPED_UNICODE);
    }
    $sentencia->close();
    $conexion->close();

?>