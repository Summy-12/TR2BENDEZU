<?php
include '../Funciones/conexion1.php';

$con = conectar();


if (isset($_POST['anime_id'])) {
    $anime_id = $_POST['anime_id'];

    $con = conectar();
    $anime_id = mysqli_real_escape_string($con, $anime_id);

    // Llama al procedimiento almacenado para eliminar el anime
    $query = "CALL EliminarAnime($anime_id)";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Anime eliminado exitosamente.";
    } else {
        echo "Error al eliminar el anime: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Parámetros incorrectos.";
}
