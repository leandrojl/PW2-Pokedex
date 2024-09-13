/*************************** CONECTAR BOTON NUEVO PARA ABRIR POPUP CON FORMULARIO **************************************/

// Obtener el modal y los elementos
var popup = document.getElementById("popupForm");
var nuevoBtn = document.getElementById("nuevoBtn");
var closeBtn = document.getElementsByClassName("close")[0];

// Cuando se haga clic en el botón "Nuevo", se muestra el popup
nuevoBtn.onclick = function() {
    popup.style.display = "block";
}

// Cuando se haga clic en la "X", se cierra el popup
closeBtn.onclick = function() {
    popup.style.display = "none";
}

// Cuando se hace clic fuera del contenido del popup, se cierra
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

/********************** SUBIR IMAGEN ***************************/

// Obtener el input de archivo y la imagen de vista previa
var inputArchivo = document.getElementById('archivo');
var previewImg = document.getElementById('previewImg');

// Escuchar el cambio en el input de archivo
inputArchivo.addEventListener('change', function(event) {
    var archivo = event.target.files[0];

    // Si hay un archivo seleccionado y es una imagen, mostrar la vista previa
    if (archivo && archivo.type.startsWith('image/')) {
        var lector = new FileReader();
        lector.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        }
        lector.readAsDataURL(archivo);
    } else {
        previewImg.style.display = 'none'; // Ocultar la vista previa si no es una imagen
    }
});
