<?php
class Motor {
    public function encender() {
        echo "Motor encendido.<br>";
    }

    public function apagar() {
        echo "Motor apagado.<br>";
    }
}

class Coche {
    private $motor;

    public function __construct() {
        $this->motor = new Motor();
    }

    public function arrancar() {
        $this->motor->encender();
        echo "Coche arrancado.<br>";
    }

    public function detener() {
        $this->motor->apagar();
        echo "Coche detenido.<br>";
    }
}

$coche = new Coche();
$coche->arrancar();
$coche->detener();
?>