<?php

function conectar()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "anime_db";

    // Intentar establecer la conexión
    $con = mysqli_connect($host, $user, $pass, $bd) or die("Error al conectar a la base de datos");

    // Comprobar si la conexión tuvo éxito
    if ($con) {
        echo "";
    } else {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    return $con;
}
