function validarYBuscarAnime() {
    var animeNameInput = document.getElementById('anime-name');
    var animeName = animeNameInput.value.trim();
    var regex = /^[A-Za-z\s]+$/;

    if (animeName === '') {
        alert('Por favor, ingrese el nombre del anime.');
    } else if (!regex.test(animeName)) {
        alert('El nombre del anime no debe contener números ni caracteres especiales.');
    } else {
        // Realiza la búsqueda del anime
        buscarAnime();
    }
}


function validarCategoriaYDescripcion() {
    var categoriaSelect = document.getElementById('categoria-select');
    var descripcionTextarea = document.getElementById('descripcion-anime');

    if (categoriaSelect.value === '' && descripcionTextarea.value.trim() === '') {
        alert('Por favor, complete todos los campos.');
        event.preventDefault(); // Evita que el formulario se envíe
    } else if (categoriaSelect.value === '') {
        alert('Por favor, seleccione una categoría.');
        event.preventDefault(); // Evita que el formulario se envíe
    } else if (descripcionTextarea.value.trim() === '') {
        alert('Por favor, ingrese una descripción para el anime.');
        event.preventDefault(); // Evita que el formulario se envíe
    }

    return true;
}

document.getElementById('guardar-anime').addEventListener('click', function(event) {
    var categoriaSelect = document.getElementById('categoria-select');
    var descripcionTextarea = document.getElementById('descripcion-anime');


});