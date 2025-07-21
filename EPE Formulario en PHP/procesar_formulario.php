<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techsoluciones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Validar el nombre (solo letras y espacios)
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        die("El nombre solo puede contener letras y espacios.");
    }

    // Validar el email (formato de email)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, ingrese un email válido.");
    }

    // Validar el mensaje (no vacío)
    if (empty(trim($mensaje))) {
        die("El mensaje no puede estar vacío.");
    }

    // Preparar y bindear
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
