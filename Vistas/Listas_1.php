<?php
include '../Funciones/Agregar.php';

$con = conectar();



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Lista de Anime</title>



    <style>
        body {
            margin: 0;

            background-image: url('../img/uni.png');

        }

        .eliminar-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin: 10px auto;
            /* Centra verticalmente y agrega separación */
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .eliminar-button:hover {
            background-color: darkred;
        }

        .editar-button {
            background-color: aqua;
            color: #1E90FF;
            border: none;
            padding: 10px 27px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin: 10px auto;
            /* Centra verticalmente y agrega separación */
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .editar-button:hover {
            background-color: aquamarine;
        }

        .tabla-container {
            display: flex;
        }

        .anime-table {
            /* ... Estilos de la tabla ... */
            flex: 1;

        }

        .imagen-container {
            padding: 20px;

        }

        .imagen {
            max-width: 600px;

        }

        .cuadro_1 {
            width: 80%;
            height: 60%;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .titulo {
            text-align: center;

            color: #FFD700;

            text-shadow: 2px 2px 4px black;

            font-size: 60px;

            font-weight: bold;

        }

        .categoria-label {
            display: block;
            color: white;

            text-align: center;

            text-shadow: 2px 1px 4px blue;
            font-weight: bold;
            margin-bottom: 20px;

        }




        .anime-table {

            border: 2px solid maroon;
            box-shadow: 2px 2px 4px gray;
            width: 100%;


            margin: 20px 0;

            border-color: #aaa;

        }

        .anime-table th,
        .anime-table td {
            padding: 10px;

            text-align: left;

            border: 1px solid maroon;
            border-color: #f0f0f0;
            background-color: #0A69AA;
            text-align: justify;
            font-size: 15px;
            color: #f0f0f0;
            text-decoration: double;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        .anime-table th {
            text-align: center;

            background-color: blue;

            color: white;

        }

        /* Estilos para el modal */


        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            background-color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }


        .categoria-label {
            margin-right: 10px;
            /* Espacio entre la etiqueta y el select */
        }


        .categoria-container {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            align-items: center;
            text-align: center;
            justify-content: space-around;
        }

        .categoria-box {
            width: 200px;

            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            text-align: center;
            background-color: #f0f0f0;
        }

        .categoria-box h2 {
            font-size: 18px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            position: relative;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
        }

        .close:hover {
            color: red;
        }

        #categoria-select {
            width: 100%;

            padding: 10px;

            border: 2px solid #FFD700;

            border-radius: 5px;

            box-shadow: 0 0 10px rgba(0, 0, 255, 0.2);

            background-color: #1E90FF;

            color: white;

            font-size: 16px;

            font-weight: bold;
            transition: box-shadow 0.3s;

        }

        #categoria-select:hover {
            box-shadow: 0 0 20px rgba(0, 0, 255, 0.4);

        }
    </style>
</head>

<body>
    <div id="container1">
        <div id="sidebar">
            <div class="logo">
                <img src="../img/logo.png" alt="" width="200" height="200" style="border-radius: 100px; text-align: center;">
            </div>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="./Vistas/anime_busqueda.php">Buscar Anime</a></li>
                <li><a href="./Vistas/Listas_1.php">Lista de Anime</a></li>

            </ul>
        </div>
        <div id="main-content">
            <div class="cuadro_1">
                <h1 class="titulo">Lista series</h1>
                <div class="categoria-container">
                    <label for="categoria-select" class="categoria-label">Selecciona una categoría:</label>

                    <select id="categoria-select" onchange="filtrarPorCategoria()">

                        <option value="todas_las_categorias">Todos</option>
                        <?php
                        // Obtener la lista de categorías desde la base de datos
                        $result = mysqli_query($con, "SELECT * FROM Categorias");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['nombre_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
                        }

                        ?>

                    </select>


                </div>
                <table class="anime-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoria</th>
                            <th>Acción</th>

                        </tr>






                    </thead>
                    <tbody>
                        <?php ListarAnimes(); ?>
                    </tbody>
                </table>

                <div class="imagen-container">
                    <img class="imagen" src="../img/a14.gif" alt="Imagen de ejemplo">
                </div>
            </div>


            <div id="formularioEditar" style="display: none;">
                <h2>Editar Descripción</h2>
                <form id="formularioEditarAnime">
                    <input type="hidden" id="anime_id" name="anime_id">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion">
                    <button type="button" onclick="actualizarDescripcion()">Actualizar Descripción</button>
                </form>
            </div>
        </div>




        <script>
            function mostrarFormularioEditar(anime_id, descripcion) {
                document.getElementById("anime_id").value = anime_id;
                document.getElementById("descripcion").value = descripcion;
                document.getElementById("formularioEditar").style.display = "block";
            }
        </script>

        <script src="../js/editar.js">

        </script>




        <script src="../js/eliminar.js">

        </script>


        <script src="../js/filtrar.js"> </script>

        <script src="../js/lista.js"> </script>
        <script src="../js/editar.js"> </script>







</body>

</html>