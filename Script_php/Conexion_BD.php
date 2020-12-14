<?php

    class ConexionBD {
        private $conexion;

        private $host = 'localhost:3306';
        private $usuario = 'User';
        private $contraseña = '12345';
        private $bd = 'pweb';

        public function __construct() {
            $this->conexion = mysqli_connect($this->host, $this->usuario, $this->contraseña, $this->bd);

            if($this->conexion) {
                //echo "Conexión establecida =) <br>";
            } else {
                //die("<br>Error en conexion ".mysqli_connect_error()."<br>".mysqli_connect_errno());
            }
        }

        public function getConexion() {
            return  $this->conexion;
        }
    }

?>