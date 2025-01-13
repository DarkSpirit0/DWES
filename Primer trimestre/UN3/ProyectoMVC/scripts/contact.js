function showAdditionalFields() {
    // Ocultar todos los campos adicionales al inicio
    document.getElementById("field-publico").style.display = "none";
    document.getElementById("field-actividad").style.display = "none";
    document.getElementById("field-ubicacion").style.display = "none";
    document.getElementById("field-otro").style.display = "none";

    // Selecciona el tipo de evento
    const selectInputType = document.getElementById("input-type");

    // Muestra los campos adicionales específicos según la opción seleccionada
    if (selectInputType.value === "Publico") {
        document.getElementById("field-publico").style.display = "block";
    } else if (selectInputType.value === "Actividad") {
        document.getElementById("field-actividad").style.display = "block";
    } else if (selectInputType.value === "Ubicacion") {
        document.getElementById("field-ubicacion").style.display = "block";
    } else if (selectInputType.value === "Otro") {
        document.getElementById("field-otro").style.display = "block";
    }
}

function showSubFields(fieldId, subFieldId) {
    // Muestra/oculta subcampos específicos en función de la opción seleccionada
    document.getElementById(subFieldId).style.display = document.getElementById(fieldId).value ? "block" : "none";
}

function openPopup(event) {
    // Prevenir que el formulario se envíe inmediatamente
    event.preventDefault();

    // Obtener los datos del formulario
    let formData = new FormData(event.target);
    
    // Crear una ventana emergente
    let popup = window.open("", "Popup", "width=600,height=400");

    // Crear contenido HTML para la ventana emergente
    let content = "<h3>Datos recibidos:</h3>";

    // Recorrer los datos del formulario y agregar al contenido
    formData.forEach(function(value, key) {
        content += `<p><strong>${key.replace(/_/g, ' ').toUpperCase()}:</strong> ${value}</p>`;
    });

    // Insertar el contenido en la ventana emergente
    popup.document.write(content);
}

