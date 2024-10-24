<?php
class Persona {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar() {
        echo "¡Hola, soy " . $this->nombre . " y tengo " . $this->edad . " años!<br>";
    }
}

// Crear una instancia de la clase Persona
$persona1 = new Persona("María", 28);
$persona1->saludar();
?>