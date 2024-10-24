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

// Crear índice en la columna nombre para acelerar las búsquedas
$sqlCrearIndice = "CREATE INDEX idx_nombre ON Productos(nombre)";

if ($conn->query($sqlCrearIndice) === TRUE) {
    echo "Índice creado exitosamente.<br>";
} else {
    echo "Error creando índice: " . $conn->error . "<br>";
}

// Consultar productos con búsqueda optimizada
$nombreBusqueda = "Smartphone";
$stmt = $conn->prepare("SELECT id, nombre, precio FROM Productos WHERE nombre = ?");
$stmt->bind_param("s", $nombreBusqueda);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "Resultados de la búsqueda:<br>";
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. " - Precio: $" . $fila["precio"]. "<br>";
    }
} else {
    echo "No se encontraron productos con el nombre especificado.<br>";
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>