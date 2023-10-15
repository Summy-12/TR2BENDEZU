<?php
include './conexion1.php';

$con = conectar();

if ($con) {
    echo "Se realizó exitosamente la conexión a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}
