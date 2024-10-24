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

// Actualizar datos
$sqlActualizar = "UPDATE Productos SET precio = 899.99 WHERE nombre = 'Laptop'";

if ($conn->query($sqlActualizar) === TRUE) {
    echo "Precio del producto actualizado exitosamente.<br>";
} else {
    echo "Error actualizando precio: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>