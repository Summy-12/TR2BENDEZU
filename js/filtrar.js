function filtrarPorCategoria() {
    var categoriaSelect = document.getElementById('categoria-select');
    var categoriaSeleccionada = categoriaSelect.value;

    console.log("Categoría seleccionada: " + categoriaSeleccionada);

    // Verificar si se ha seleccionado "Todos"
    if (categoriaSeleccionada === "todas_las_categorias") {
        // Recarga la página actual para mostrar todos los animes nuevamente
        window.location.reload();
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../Funciones/Filtrar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Llama a una función para actualizar la tabla con los resultados de la filtración
                actualizarTabla(xhr.responseText);
                
            }
        };

       
        var params = "categoria=" + encodeURIComponent(categoriaSeleccionada);

        // Enviando la solicitud POST con los parámetros en el cuerpo
        xhr.send(params);
    }
}


function actualizarTabla(nuevaTablaHTML) {
    var tabla = document.querySelector('.anime-table tbody');
    tabla.innerHTML = nuevaTablaHTML;
}
