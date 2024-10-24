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
$usuario = "admin";
$passwordIngresada = "' OR '1'='1";

// Preparar y enlazar
$stmt = $conn->prepare("SELECT * FROM Usuarios WHERE nombre = ? AND password = ?");
$stmt->bind_param("ss", $usuario, $passwordIngresada);

// Ejecutar la consulta
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "Acceso concedido.<br>";
} else {
    echo "Acceso denegado.<br>";
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>