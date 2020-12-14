<?php
    include('Conexion_BD.php');

    class CuentaDAO {
        private $conexion;

        public function __construct() {
            $this->conexion = new ConexionBD();
        }

        //=============================== METODOS PARA ABCC ===============================

        //------------------------------- ALTAS -------------------------------

        public function AgregarCuentaNueva($n, $ap, $correo, $contra, $d, $c, $e, $zip) {
            
            $u_cifrado = sha1($correo);
            $p_cifrado = sha1($contra);

            $sql = "SELECT * FROM cuenta WHERE correo='$u_cifrado'";

            $res = mysqli_query($this->conexion->getConexion(), $sql);
            if(mysqli_num_rows($res)==1){//error correo existtene
                header("location:../Paginas/RegistroCorreoError.html");
            }else{
                $sql = "INSERT INTO cuenta (correo,contraseña) VALUES('$u_cifrado', '$p_cifrado')";    
            
                if(mysqli_query($this->conexion->getConexion(), $sql) ) {
                    //echo "Perfecto, casi soy ISC =)";
                    //header('location:..........')
                    
                    $sql = "INSERT INTO info VALUES( (select idu from cuenta where correo='$u_cifrado' and contraseña='$p_cifrado' ),
                    '$n', '$ap','$d','$c','$e','$zip')"; 
                        if(mysqli_query($this->conexion->getConexion(), $sql) ) {
                            //echo "Perfecto, casi soy ISC =)";
                            //header('location:..........')

                            echo "<script> alert('Agregado con Exito'); </script>";
                            header('location:../Paginas/LoginR.html');

                        } else {
                            echo "¿Será muy tarde para cambiar de carrera?";
                            echo mysqli_error($this->conexion->getConexion());
                        }
                } else {
                    echo "¿Será muy tarde para cambiar de carrera?";
                    echo mysqli_error($this->conexion->getConexion());
                }
            }
                    
            
        
        }

        public function eliminarAlumnos($nc) {
            $sql = "DELETE FROM Alumnos WHERE Num_Control='$nc'";
            
            if(mysqli_query($this->conexion->getConexion(), $sql) ) {
                //echo "Perfecto, casi soy ISC =)";
                //header('location:..........')
                //echo "<script> alert('Agregado con Exito'); </script>";
                header('location:../vistas/formulario_bajas.php');

            } else {
                echo "¿Será muy tarde para cambiar de carrera?";
                echo mysqli_error($this->conexion->getConexion());
            }
        }

        public function modificarAlumnos($nc, $n, $pa, $sa, $e, $s, $c) {
            $sql = "UPDATE Alumnos SET Num_Control='$nc', Nombre='$n', Primer_Ap='$pa', Segundo_Ap='$sa', Edad=$e, Semestre=$s, Carrera='$c' WHERE Num_Control='$nc';";
            
            if(mysqli_query($this->conexion->getConexion(), $sql) ) {
                echo "<script> alert('Modificado con Exito'); </script>";
                header('location:../vistas/formulario_cambios.php');

            } else {
                echo "¿Será muy tarde para cambiar de carrera?";
                echo mysqli_error($this->conexion->getConexion());
            }
        }

        public function buscarAlumnos($campo, $valor) {
            $sql = "SELECT * FROM Alumnos WHERE ".$campo."='$valor'";
            
            if(mysqli_query($this->conexion->getConexion(), $sql) ) {
                echo "<script> alert('Busqueda con Exito'); </script>";
                header('location:../vistas/formulario_consultas.php');

            } else {
                echo "¿Será muy tarde para cambiar de carrera?";
                echo mysqli_error($this->conexion->getConexion());
            }
        }


    }
?>