<?php
include 'conexion1.php';

function obtenerCategorias()
{
    global $con;
    $categorias = array();

    // Llama al procedimiento almacenado para obtener las categorías
    $result = mysqli_query($con, "CALL ObtenerCategorias()");

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categorias[] = $row;
        }
        // Libera el resultado
        mysqli_free_result($result);
    } else {
        echo "Error al obtener categorías: " . mysqli_error($con);
    }

    // Agrega una opción vacía al principio del array de categorías
    array_unshift($categorias, array('categoria_id' => '', 'nombre_categoria' => 'Seleccionar categoría'));

    return $categorias;
}
