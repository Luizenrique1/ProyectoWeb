<?php
    include 'Conect.php';
    
    $correo=$_POST['correo'];

    
    //$us_correo="c@g.com";
    //$us_contra="123";
     $correoCifrado=sha1($correo);
     $consulta="Delete from cuenta where correo='$correoCifrado'";

    mysqli_query($conexion, $consulta) or die (mysqli_error());
    mysqli_close();

?>