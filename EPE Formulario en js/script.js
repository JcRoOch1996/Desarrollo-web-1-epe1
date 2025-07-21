// Función principal de validación del formulario
function validateForm() {
    // Obtener los valores de los campos
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var hasError = false; // Variable para controlar si hay errores

    // Limpiar mensajes de error anteriores
    document.getElementById("nameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("messageError").textContent = "";

    // Validación del campo Nombre
    if (name === "") {
        document.getElementById("nameError").textContent = "El nombre es obligatorio.";
        hasError = true;
    } else if (!/^[a-zA-Z\s]+$/.test(name)) {
        document.getElementById("nameError").textContent = "El nombre solo debe contener letras y espacios.";
        hasError = true;
    }

    // Validación del campo Correo Electrónico
    if (email === "") {
        document.getElementById("emailError").textContent = "El correo electrónico es obligatorio.";
        hasError = true;
    } else if (!validateEmail(email)) {
        document.getElementById("emailError").textContent = "Por favor, ingrese un correo electrónico válido.";
        hasError = true;
    }

    // Validación del campo Mensaje
    if (message === "") {
        document.getElementById("messageError").textContent = "El mensaje es obligatorio.";
        hasError = true;
    }

    // Prevenir el envío del formulario si hay errores
    return !hasError;
}

// Función para validar el formato del correo electrónico
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
