<?php
session_start();
session_destroy();
header("location:../Paginas/NoSession.php");
?>