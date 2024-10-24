<?php
// Archivo PHP para procesar el formulario de contacto de manera segura

// Habilitar la visualización de errores (solo para desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos con usuario de permisos limitados
// $servername = "localhost";
// $username = "Enric"; 
// $password = "B!ychXDuHQMFkxvR"; 
// $dbname = "registro";
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root";        // Nombre de usuario de la base de datos
$password = "";            // Contraseña de la base de datos
$dbname = "mi_proyecto_db"; // Nombre de la base de datos

// Crear una conexión a la base de datos utilizando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    // Enviar una respuesta en formato JSON indicando el error
    echo json_encode(['success' => false, 'error' => 'Conexión fallida: ' . $conn->connect_error]);
    exit();
}

// Obtener los datos enviados desde el formulario
$name = $_POST['name'];
$email = $_POST['email'];

// Preparar la consulta SQL utilizando sentencias preparadas para evitar inyecciones SQL
$stmt = $conn->prepare("INSERT INTO contactos (nombre, email) VALUES (?, ?)");

if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit();
}

// Vincular los parámetros a la consulta
$stmt->bind_param("ss", $name, $email);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Enviar una respuesta en formato JSON indicando éxito
    echo json_encode(['success' => true]);
} else {
    // Enviar una respuesta en formato JSON indicando fracaso
    echo json_encode(['success' => false, 'error' => 'Error en la ejecución de la consulta: ' . $stmt->error]);
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
