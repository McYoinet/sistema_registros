<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $base = "login";

    $con = new mysqli($host, $user, $pass, $base);

    if($con->connect_errno){
        die('No se pudo conectar a la base de datos: ' . $con->connect_error);
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>