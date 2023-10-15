// Función para mostrar el modal
function mostrarFormulario() {
    var modal = document.getElementById("form-container");
    modal.style.display = "block";
}

// Función para cerrar el modal
function cerrarFormulario() {
    var modal = document.getElementById("form-container");
    modal.style.display = "none";
}

// Cierra el modal si el usuario hace clic fuera de él
window.onclick = function(event) {
    var modal = document.getElementById("form-container");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}






