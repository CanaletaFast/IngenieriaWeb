<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_basedatos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Datos de usuario (simulados)
$nombre = "Pedro";
$email = "pedro@example.com";

// Preparar y enlazar
$stmt = $conn->prepare("INSERT INTO Usuarios (nombre, email) VALUES (?, ?)");
$stmt->bind_param("ss", $nombre, $email);

// Ejecutar la consulta
if ($stmt->execute() === TRUE) {
    echo "Nuevo usuario insertado exitosamente.<br>";
} else {
    echo "Error insertando usuario: " . $stmt->error . "<br>";
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>