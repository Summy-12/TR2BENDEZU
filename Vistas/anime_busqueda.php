<?php

include '../Funciones/Obtenercategoria.php';

$con = conectar();


$categorias = obtenerCategorias();


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>Buscar Anime en AniList</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('../img/s1.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }



        .cuadro1 {
            width: 60%;
            max-width: 800px;
            background: url('../img/uni.png');
            margin: 0 auto;
            padding: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px darkgray;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        /* Estilos para la ventana emergente */
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 4px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        /* Estilo para el botón de cierre */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }


        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #000;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        /* Estilo para el botón de cierre */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Estilos para el formulario */
        .form-group {
            margin: 10px;
        }

        form input,
        form textarea,
        form select {
            padding: 5px;

        }

        .imagen-container {
            padding: 20px;

        }

        .imagen {
            max-width: 300px;
            margin-top: 40px;

        }

        .btnbuscar {
            background-color: aqua;

            border: 2px solid gold;

            color: #000;

            padding: 10px 20px;

            border-radius: 5px;

            cursor: pointer;
            font-weight: bold;


        }

        .btnbuscar:hover {
            background-color: #ffcc00;

        }

        #guardar-anime,
        #agregar-lista {
            background-color: #ffd700;
            border: 2px solid gold;
            color: #000;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        #guardar-anime:hover,
        #agregar-lista:hover {
            background-color: #ffcc00;
        }

        .input {
            width: 40%;
            margin-left: 12px;
            border: 2px solid #FFD700;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.2);
            transition: box-shadow 0.3s;
        }

        .input:hover {
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
            <div class="cuadro1">

                <h1>Buscar Anime en AniList</h1>


                <input class="input " type=" text" id="anime-name" name="anime-name">

                <button id="buscar-anime" class="btnbuscar" onclick="validarYBuscarAnime()">Buscar</button>

                <div id="anime-info" style="display: none;">
                    <h2>Nombre Anime: <br>
                        <span id="anime-title"></span>
                    </h2>
                    <a id="anime-link" href="" target="_blank">
                        <img id="anime-image" src="" alt="Imagen del Anime">
                    </a>
                    <br>
                </div>

                <div id="anime-detalles">
                    <h2>Detalles del Anime:</h2>
                    <ul id="anime-informacionAnime" class="menu"></ul>

                </div>

                <button id="agregar-lista" style="display: none; margin: 10px auto;" onclick="abrirPopup()">Agregar Lista</button>

                <div class="popup-container" id="popup">
                    <div class="popup-content">
                        <span class="close-button" onclick="cerrarPopup()">&times;</span>
                        <h2 id="popup-title">Agregar Anime a la Lista</h2>
                        <form id="anime-form" action="Listas_1.php" method="post">
                            <div class="form-group">
                                <label for="nombre-anime">Nombre del Anime:</label>
                                <input type="text" id="nombre-anime" name="nombre-anime" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="imagen-anime"></label>
                                <img id="imagen-preview" src="" style="width: 200px; height: 200px; border-radius: 40px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);">
                                <input type="hidden" id="imagen-url" name="imagen-url">
                            </div>



                            <div class="form-group">
                                <label for="descripcion-anime" style="padding-left: 20px;">Descripción:</label>
                                <div class=" form-group">
                                    <textarea id="descripcion-anime" name="descripcion-anime" rows="2" style=" width: 400px; height: 100px" placeholder="Escribe algo..."></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="categoria-select">Categoría:</label>
                                <select id="categoria-select" name="categoria-select">
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option value="<?php echo $categoria['categoria_id']; ?>">
                                            <?php echo $categoria['nombre_categoria']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="guardar-anime" name="Guardar-anime" onclick="validarCategoriaYDescripcion()">Guardar</button>

                            </div>
                        </form>
                    </div>
                </div>







            </div>
        </div>
        <div class="imagen-container">
            <img class="imagen" src="../img/miku1.gif" alt="Imagen de ejemplo">
        </div>

    </div>
    <script src="../js/validar.js">

    </script>

    </script>

    <script src="../js/anime.js">

    </script>

</body>