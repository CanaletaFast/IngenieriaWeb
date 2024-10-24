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

// Iniciar transacción
$conn->begin_transaction();

try {
    // Primera operación
    $sql1 = "INSERT INTO Usuarios (nombre, email) VALUES ('Luis', 'luis@example.com')";
    if (!$conn->query($sql1)) {
        throw new Exception($conn->error);
    }

    // Segunda operación
    $sql2 = "UPDATE Productos SET precio = precio - 50 WHERE nombre = 'Laptop'";
    if (!$conn->query($sql2)) {
        throw new Exception($conn->error);
    }

    // Confirmar transacción
    $conn->commit();
    echo "Transacción completada exitosamente.<br>";
} catch (Exception $e) {
    // Revertir transacción en caso de error
    $conn->rollback();
    echo "Error en la transacción: " . $e->getMessage() . "<br>";
}

// Cerrar conexión
$conn->close();
?>