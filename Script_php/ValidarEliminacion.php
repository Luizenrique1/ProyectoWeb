<?php
                
                    include('../Script_php/Conexion_BD.php');

                    $con = new ConexionBD();
                    $conexion = $con->getConexion();
                    $c = $_POST['cont'];
                    $c2 = $_POST['cont2'];
                    session_start();
                    $correo=$_SESSION['correo'];
                    $contra=$_SESSION['contra'];    
                    $correoS=sha1($correo);
                    $contraS=sha1($contra);
                    $contraNueva='';
                    if($contra==$c && $c==$c2){
                        $contraNueva=sha1($c);
                            $sql = "delete FROM cuenta WHERE correo='$correoS' AND contraseña='$contraS'";

                            $idu='';

                            $res = mysqli_query($conexion, $sql);                
                               
                                
                                session_destroy();
                        header("location:../index.php");
                    }else{
                        
                        echo "error";
                    }
                    
                   

?>