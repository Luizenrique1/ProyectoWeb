<?php
    include 'Conect.php';
    
    $correo=$_GET['correo'];
    $c=sha1($correo);
    $consulta="SELECT * FROM INFO WHERE IDU =(SELECT IDU FROM CUENTA WHERE CORREO='$c')";
    $resultado = $conexion -> query($consulta);
    
    while($fila=$resultado->fetch_array()){
        $producto[]=array_map('utf8_encode', $fila);
    }
    
    echo json_encode($producto);
    $resultado->close();
?>