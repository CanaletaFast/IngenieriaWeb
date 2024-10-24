<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sqlCrearDB = "CREATE DATABASE IF NOT EXISTS mi_basedatos";
if ($conn->query($sqlCrearDB) === TRUE) {
    echo "Base de datos creada o ya existe.<br>";
} else {
    echo "Error creando la base de datos: " . $conn->error . "<br>";
}

// Seleccionar base de datos
$conn->select_db("mi_basedatos");

// Crear tabla
$sqlCrearTabla = "CREATE TABLE IF NOT EXISTS Productos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    precio DECIMAL(10,2),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCrearTabla) === TRUE) {
    echo "Tabla Productos creada o ya existe.<br>";
} else {
    echo "Error creando la tabla: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>