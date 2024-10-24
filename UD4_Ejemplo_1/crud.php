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

// Crear tabla
$sqlCrearTabla = "CREATE TABLE IF NOT EXISTS Usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCrearTabla) === TRUE) {
    echo "Tabla Usuarios creada o ya existe.<br>";
} else {
    echo "Error creando la tabla: " . $conn->error . "<br>";
}

// Insertar datos
$sqlInsertar = "INSERT INTO Usuarios (nombre, email) VALUES ('Laura', 'laura@example.com')";

if ($conn->query($sqlInsertar) === TRUE) {
    echo "Nuevo registro creado exitosamente.<br>";
} else {
    echo "Error: " . $sqlInsertar . "<br>" . $conn->error . "<br>";
}

// Leer datos
$sqlLeer = "SELECT id, nombre, email FROM Usuarios";
$resultado = $conn->query($sqlLeer);

if ($resultado->num_rows > 0) {
    echo "Usuarios:<br>";
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. " - Email: " . $fila["email"]. "<br>";
    }
} else {
    echo "0 resultados.<br>";
}

// Actualizar datos
$sqlActualizar = "UPDATE Usuarios SET email='laura.nuevo@example.com' WHERE nombre='Laura'";

if ($conn->query($sqlActualizar) === TRUE) {
    echo "Registro actualizado exitosamente.<br>";
} else {
    echo "Error actualizando registro: " . $conn->error . "<br>";
}

// Eliminar datos
$sqlEliminar = "DELETE FROM Usuarios WHERE nombre='Laura'";

if ($conn->query($sqlEliminar) === TRUE) {
    echo "Registro eliminado exitosamente.<br>";
} else {
    echo "Error eliminando registro: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>