<?php

include 'conect.php';
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $contra=$_POST['contra'];
    $direccion=$_POST['direccion'];
    $ciudad=$_POST['ciudad'];
    $estado=$_POST['estado'];
    $zip=$_POST['zip'];
    
    $correoCifrado=sha1($correo);
    $contraCifrado=sha1($contra);

    $consulta="INSERT INTO cuenta (correo,contraseña) VALUES('$correoCifrado', '$contraCifrado')";

    mysqli_query($conexion, $consulta) or die (mysqli_error());
    mysqli_close();
    
    $consulta1 = "INSERT INTO info VALUES( (select idu from cuenta where correo='$correoCifrado' and contraseña='$contraCifrado' ),
                    '$nombre', '$apellido','$direccion','$ciudad','$estado','$zip')"; 
    
    mysqli_query($conexion, $consulta1) or die (mysqli_error());
    mysqli_close();
?>