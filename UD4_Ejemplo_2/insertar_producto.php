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

// Insertar datos
$sqlInsertar = "INSERT INTO Productos (nombre, precio) VALUES ('Laptop', 999.99)";

if ($conn->query($sqlInsertar) === TRUE) {
    echo "Nuevo producto insertado exitosamente.<br>";
} else {
    echo "Error insertando producto: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>