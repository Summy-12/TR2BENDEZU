function eliminarAnime(anime_id, row) {
    if (confirm("¿Seguro que quieres eliminar este anime?")) {
        // Hacer una solicitud AJAX para eliminar el anime
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./eliminar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                alert(xhr.responseText);

                // Verifica si la eliminación fue exitosa
                if (xhr.responseText === "Anime eliminado exitosamente.") {
                    // Elimina la fila de la tabla
                    row.parentNode.removeChild(row);
                }
            }
        };
        xhr.send("anime_id=" + anime_id);
    }
}
