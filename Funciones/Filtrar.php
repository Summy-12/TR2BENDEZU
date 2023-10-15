<?php
include './Agregar.php';

$con = conectar();

if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    if ($categoria === 'todas_las_categorias') {
        // Si se selecciona "Todos," simplemente lista todos los animes sin filtro
        $query = "CALL ListarAnimes()";
    } else {
        // Llama al procedimiento almacenado para listar animes por la categoría seleccionada
        $query = "CALL ListarAnimesPorCategoria('$categoria')";
    }

    $result = mysqli_query($con, $query);

    if ($result) {
        // Inicializa una variable para almacenar el contenido de la tabla
        $tableContent = '';

        while ($row = mysqli_fetch_assoc($result)) {
            $tableContent .= '<tr >';
            $tableContent .= '<td>' . $row['anime_id'] . '</td>';
            $tableContent .= '<td><img src="' . $row['imagen'] . '" alt="Imagen del anime"></td>';
            $tableContent .= '<td>' . $row['titulo'] . '</td>';
            $tableContent .= '<td>' . $row['descripcion'] . '</td>';
            $tableContent .= '<td>' . $row['nombre_categoria'] . '</td>';

            $tableContent .= '
            <td>
            
           
        
            <button class="eliminar-button" onclick="eliminarAnime(' . $row['anime_id'] . ', this.parentNode.parentNode)">Eliminar</button>
       
           
            </td>';


            $tableContent .= '</tr>';
        }

        // Devuelve solo el contenido de la tabla sin el encabezado
        echo $tableContent;
    } else {
        echo "Error al listar animes: " . mysqli_error($con);
    }

    mysqli_close($con);
}
