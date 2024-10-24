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

// Leer datos
$sqlLeer = "SELECT id, nombre, precio FROM Productos";
$resultado = $conn->query($sqlLeer);

if ($resultado->num_rows > 0) {
    echo "Productos:<br>";
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. " - Precio: $" . $fila["precio"]. "<br>";
    }
} else {
    echo "0 resultados.<br>";
}

// Cerrar conexión
$conn->close();
?>