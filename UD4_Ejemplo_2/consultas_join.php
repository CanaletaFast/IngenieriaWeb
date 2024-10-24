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

// Suponiendo que hay una tabla Categorias con id y nombre
// Crear tabla Categorias si no existe
$sqlCrearCategorias = "CREATE TABLE IF NOT EXISTS Categorias (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
)";
$conn->query($sqlCrearCategorias);

// Insertar categorías
$sqlInsertarCategoria = "INSERT INTO Categorias (nombre) VALUES ('Electrónica'), ('Ropa'), ('Hogar')";
$conn->query($sqlInsertarCategoria);

// Crear tabla Productos con clave foránea
$sqlCrearProductos = "CREATE TABLE IF NOT EXISTS Productos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    precio DECIMAL(10,2),
    categoria_id INT(6) UNSIGNED,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES Categorias(id)
)";
$conn->query($sqlCrearProductos);

// Insertar productos con categorías
$sqlInsertarProducto = "INSERT INTO Productos (nombre, precio, categoria_id) VALUES 
    ('Smartphone', 599.99, 1),
    ('Camiseta', 19.99, 2),
    ('Silla', 49.99, 3)";
$conn->query($sqlInsertarProducto);

// Consulta con JOIN
$sqlJoin = "SELECT Productos.nombre AS Producto, Productos.precio, Categorias.nombre AS Categoria
            FROM Productos
            JOIN Categorias ON Productos.categoria_id = Categorias.id";

$resultado = $conn->query($sqlJoin);

if ($resultado->num_rows > 0) {
    echo "Productos con Categorías:<br>";
    while($fila = $resultado->fetch_assoc()) {
        echo "Producto: " . $fila["Producto"]. " - Precio: $" . $fila["precio"]. " - Categoría: " . $fila["Categoria"]. "<br>";
    }
} else {
    echo "0 resultados.<br>";
}

// Cerrar conexión
$conn->close();
?>