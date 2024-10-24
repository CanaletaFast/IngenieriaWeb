<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos enviados por el formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);

    // Mostramos los datos en pantalla (puedes personalizar esto)
    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email;
} else {
    echo "No se recibieron datos.";
}
?>