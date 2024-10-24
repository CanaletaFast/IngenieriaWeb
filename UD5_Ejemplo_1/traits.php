<?php
trait Loggable {
    public function registrarLog($mensaje) {
        echo "Log: " . $mensaje . "<br>";
    }
}

class Usuario {
    use Loggable;

    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->registrarLog("Usuario $nombre creado.");
    }

    public function cambiarNombre($nuevoNombre) {
        $this->nombre = $nuevoNombre;
        $this->registrarLog("Nombre cambiado a $nuevoNombre.");
    }
}

$usuario = new Usuario("Carlos");
$usuario->cambiarNombre("Carlos Pérez");
?>