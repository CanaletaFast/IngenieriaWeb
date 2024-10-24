<?php
// Iniciar sesión
session_start();

// Establecer una variable de sesión
$_SESSION["usuario"] = "Juan";

// Establecer una cookie que expira en 30 días
setcookie("preferencia", "dark_mode", time() + (86400 * 30), "/");

// Verificar si la sesión y la cookie están establecidas
if(isset($_SESSION["usuario"])) {
    echo "Usuario en sesión: " . $_SESSION["usuario"] . "<br>";
} else {
    echo "No hay usuario en sesión.<br>";
}

if(isset($_COOKIE["preferencia"])) {
    echo "Preferencia de usuario: " . $_COOKIE["preferencia"] . "<br>";
} else {
    echo "No hay preferencias establecidas.<br>";
}
?>