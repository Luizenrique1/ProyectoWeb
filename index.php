<?php

    session_start();
    if($_SESSION['autenticado'] == false) {
        header("location:Paginas/NoSession.php");
    } else{
        
        header("location:Paginas/SiSession.php");
    }

?>