<?php
                
                    include('../Script_php/Conexion_BD.php');

                    $con = new ConexionBD();
                    $conexion = $con->getConexion();
                    $cont = $_POST['caja_contraseña'];
                    $cont2 = $_POST['caja_contraseña2'];
                    
                    $n = $_POST['caja_nombre'];
                    $ap = $_POST['caja_apellido'];
                    $correon = $_POST['caja_Correo'];
                    $d = $_POST['caja_direccion'];
                    $c = $_POST['caja_ciudad'];
                    $e = $_POST['caja_estado'];
                    $zip = $_POST['caja_zip'];

                    session_start();
                    $correo=$_SESSION['correo'];
                    $contra=$_SESSION['contra'];
                    $correoS=sha1($correo);
                    $contraS=sha1($contra);    
                    if($cont!=null && $cont2!=null && $cont==$cont2 && $cont==$contra){
                        
                            $sql = "SELECT idu FROM cuenta WHERE correo='$correoS' AND contraseña='$contraS'";

                            $idu='';

                            $res = mysqli_query($conexion, $sql);                
                            if ($res) {
                          // output data of each row
                            while($row = mysqli_fetch_assoc($res)) {
                               
                                $idu =  $row['idu'];
                                
                            }
                            $correonuevo=sha1($correon);    
                            $sql = "Update cuenta set correo ='$correonuevo' WHERE idu='$idu'";
                                $res = mysqli_query($conexion, $sql);
                            $_SESSION['correo']=$correon;
                            $_SESSION['contra']=$cont;
                                
                            $sql = "Update info set Nombre ='$n', Apellido='$ap', Direccion='$d', Ciudad='$c', Estado='$e', Zip='$zip' WHERE idu='$idu'";    
                                $res = mysqli_query($conexion, $sql);
                               
                            } else {
                            echo "0 results";
                            }    
                    }else{
                        
                        
                    
                        
                    }
                    
                   

?>