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

// Eliminar datos
$sqlEliminar = "DELETE FROM Productos WHERE nombre = 'Laptop'";

if ($conn->query($sqlEliminar) === TRUE) {
    echo "Producto eliminado exitosamente.<br>";
} else {
    echo "Error eliminando producto: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>