<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hablar() {
        echo "Este animal hace un sonido.<br>";
    }
}

class Perro extends Animal {
    public function hablar() {
        echo $this->nombre . " dice: ¡Guau!<br>";
    }
}

$animal = new Animal("Genérico");
$animal->hablar();

$perro = new Perro("Rex");
$perro->hablar();
?>