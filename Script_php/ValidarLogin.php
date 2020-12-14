<?php

    include('Conexion_BD.php');

    $con = new ConexionBD();
    $conexion = $con->getConexion();
    //var_dump($conexion);

    if($conexion) {
        $u = $_POST['username'];
        $p = $_POST['password'];

        $u_cifrado = sha1($u);
        $p_cifrado = sha1($p);

        $sql = "SELECT * FROM cuenta WHERE correo='$u_cifrado' AND contraseña='$p_cifrado'";

        $res = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($res)==1) {
            //echo 'Usuario autenticado';
            session_start();
            $_SESSION['autenticado'] = true;
            $_SESSION['correo'] = $u;
            $_SESSION['contra'] = $p;
            header("location:../Paginas/SiSession.php"); 
        } else {
            header("location:../Paginas/loginE.php");
        }

    }

?>