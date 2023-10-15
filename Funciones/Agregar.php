<?php



include 'conexion1.php';

$con = conectar();

function insertarAnime($nombre, $imagen, $descripcion, $categoriaId)
{
    global $con;

    // Llama al procedimiento almacenado para insertar el nuevo anime
    $stmt = mysqli_prepare($con, "CALL InsertarAnime(?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $imagen, $descripcion, $categoriaId);

    if (mysqli_stmt_execute($stmt)) {
        return "";
    } else {
        return "Error al agregar el anime: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST['Guardar-anime'])) {
    // Captura los datos del formulario
    $nombreAnime = $_POST['nombre-anime'];
    $imagenAnime = $_POST['imagen-url'];   // Esto ya debe contener la URL de la imagen
    $descripcionAnime = $_POST['descripcion-anime'];
    $categoriaSelect = $_POST['categoria-select'];


    // Llama a la función para insertar el anime
    $mensaje = insertarAnime($nombreAnime, $imagenAnime, $descripcionAnime, $categoriaSelect);

    echo $mensaje; // Muestra el mensaje de éxito o error
}

function ListarAnimes()
{ {
        global $con;

        // Llama al procedimiento almacenado para listar animes
        $result = mysqli_query($con, "CALL ListarAnimes()");

        if ($result) {


            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['anime_id'] .
                    '</td>';
                echo '<td><img src="' . $row['imagen'] .
                    '" alt="Imagen del anime"></td>';
                echo '<td>' . $row['titulo'] .
                    '</td>';
                echo '<td class="description">' . $row['descripcion'] . '</td>';
                echo '<td>' . $row['nombre_categoria'] . '</td>';
                echo '<td>
                
                <button class="eliminar-button" onclick="eliminarAnime(' . $row['anime_id'] . ', this.parentNode.parentNode)">Eliminar</button>
              </td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Error al listar animes: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
}
