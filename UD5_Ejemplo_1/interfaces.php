<?php
interface Vehiculo {
    public function arrancar();
    public function detener();
}

class Coche implements Vehiculo {
    public function arrancar() {
        echo "El coche ha arrancado.<br>";
    }

    public function detener() {
        echo "El coche se ha detenido.<br>";
    }
}

class Bicicleta implements Vehiculo {
    public function arrancar() {
        echo "La bicicleta está lista para pedalear.<br>";
    }

    public function detener() {
        echo "La bicicleta ha sido detenida.<br>";
    }
}

$coche = new Coche();
$coche->arrancar();
$coche->detener();

$bicicleta = new Bicicleta();
$bicicleta->arrancar();
$bicicleta->detener();
?>