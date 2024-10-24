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

// Uso de funciones agregadas
$sqlAgregadas = "SELECT 
    COUNT(*) AS TotalProductos, 
    AVG(precio) AS PrecioPromedio, 
    MAX(precio) AS PrecioMaximo, 
    MIN(precio) AS PrecioMinimo 
FROM Productos";

$resultado = $conn->query($sqlAgregadas);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "Total de Productos: " . $fila["TotalProductos"] . "<br>";
        echo "Precio Promedio: $" . number_format($fila["PrecioPromedio"], 2) . "<br>";
        echo "Precio Máximo: $" . number_format($fila["PrecioMaximo"], 2) . "<br>";
        echo "Precio Mínimo: $" . number_format($fila["PrecioMinimo"], 2) . "<br>";
    }
} else {
    echo "0 resultados.<br>";
}

// Cerrar conexión
$conn->close();
?>