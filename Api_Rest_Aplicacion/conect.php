<?php

$hostname='localhost:3306';
$database='pweb';
$username='User';
$password='12345';

    $conexion=new mysqli($hostname,$username,$password,$database);
        if($conexion->connect_errno){
            echo "Sitio web esta experimento problemas";
        }
?>


