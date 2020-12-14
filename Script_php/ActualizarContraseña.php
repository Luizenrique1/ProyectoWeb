<?php
                
                    include('../Script_php/Conexion_BD.php');

                    $con = new ConexionBD();
                    $conexion = $con->getConexion();
                    $c = $_POST['cont'];
                    $c2 = $_POST['cont2'];
                    $a = $_POST['actual'];  
                    session_start();
                    $correo=$_SESSION['correo'];
                    $contra=$_SESSION['contra'];    
                    $correoS=sha1($correo);
                    $contraS=sha1($contra);
                    $contraNueva='';
                    if($a==$contra && $c!=null && $c2!=null && $c==$c2){
                        $contraNueva=sha1($c);
                            $sql = "SELECT idu FROM cuenta WHERE correo='$correoS' AND contraseña='$contraS'";

                            $idu='';

                            $res = mysqli_query($conexion, $sql);                
                            if ($res) {
                          // output data of each row
                            while($row = mysqli_fetch_assoc($res)) {
                               
                                $idu =  $row['idu'];
                                
                            }
                            $sql = "Update cuenta set contraseña ='$contraNueva' WHERE idu='$idu'";
                                $res = mysqli_query($conexion, $sql);
                            session_start();
                            $_SESSION['correo']=$correo;
                            $_SESSION['contra']=$c;
                                header("location:../Paginas/PerfilM.php");
                            } else {
                            echo "0 results";
                            }    
                    }else{
                        
                        header("location:../Paginas/contraE.php");
                    }
                    
                   

?>