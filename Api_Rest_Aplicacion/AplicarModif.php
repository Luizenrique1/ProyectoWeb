<?php
    include 'Conect.php';
    
    $correo=$_POST['correo'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
    $ciudad=$_POST['ciudad'];
    $estado=$_POST['estado'];
    $zip=$_POST['zip'];
    
    //$us_correo="c@g.com";
    //$us_contra="123";
     $correoCifrado=sha1($correo);
     $consulta="Update info set Nombre='$nombre',Apellido='$apellido',Direccion='$direccion',Ciudad='$ciudad',Estado='$estado',Zip='$zip' where IdU=(select IdU from cuenta where correo='$correoCifrado')";

    mysqli_query($conexion, $consulta) or die (mysqli_error());
    mysqli_close();

?>