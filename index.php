<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Spotify - Página Principal</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('../img/e12.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }



        .a1 {
            font-size: 80px;
            font-family: Bodoni;
            color: white;
            text-shadow: 2px 2px 4px black;
        }

        .a2 {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .a2 img {
            max-width: 100%;
            height: auto;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .boton {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            width: 200px;
            height: 100px;
            box-shadow: 2px 2px 5px white;
            cursor: pointer;
            font-size: 40px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
        }

        /* Estilos de la ventana emergente */
        .ventana-emergente {
            display: none;
            position: fixed;
            top: 40%;
            left: 75%;
            transform: translate(-50%, -50%);
            background-color: black;
            text-align: justify;
            color: white;
            width: 500px;
            font-family: 'Courier New', Courier, monospace;
            padding: 20px;
            border: 2px solid gold;
            /* Borde dorado */
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }



        .cerrar {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .logo {
            width: 2px;
            /* Cambia el tamaño del logo según tus preferencias */
            height: auto;
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
            <div class="a1">
                <a1>Bienvenido</a1>
            </div>

            <div class="a2">
                <img src="../img/A12.gif" alt="Texto alternativo de la imagen">
                <button class="boton" id="mostrarVentana">¡Hola!</button>
            </div>


            <div class="ventana-emergente" id="miVentana">
                <span class="cerrar" id="cerrarVentana">X</span>
                <a>"¡Bienvenido a la Página para Elegir tus Animes Favoritos! Donde puedes encontrar y marcar tus series de anime preferidas para disfrutar al máximo.".</a>
            </div>
        </div>
    </div>

    <script>
        // JavaScript para mostrar y ocultar la ventana emergente
        const mostrarVentana = document.getElementById('mostrarVentana');
        const cerrarVentana = document.getElementById('cerrarVentana');
        const miVentana = document.getElementById('miVentana');

        mostrarVentana.addEventListener('click', () => {
            miVentana.style.display = 'block';
        });

        cerrarVentana.addEventListener('click', () => {
            miVentana.style.display = 'none';
        });
    </script>
</body>

</html>