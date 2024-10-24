<?php
abstract class Figura {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    abstract public function area();

    public function getColor() {
        return $this->color;
    }
}

class Circulo extends Figura {
    private $radio;

    public function __construct($color, $radio) {
        parent::__construct($color);
        $this->radio = $radio;
    }

    public function area() {
        return pi() * pow($this->radio, 2);
    }
}

class Rectangulo extends Figura {
    private $base;
    private $altura;

    public function __construct($color, $base, $altura) {
        parent::__construct($color);
        $this->base = $base;
        $this->altura = $altura;
    }

    public function area() {
        return $this->base * $this->altura;
    }
}

$circulo = new Circulo("Rojo", 5);
echo "Color del círculo: " . $circulo->getColor() . "<br>";
echo "Área del círculo: " . $circulo->area() . "<br>";

$rectangulo = new Rectangulo("Azul", 4, 6);
echo "Color del rectángulo: " . $rectangulo->getColor() . "<br>";
echo "Área del rectángulo: " . $rectangulo->area() . "<br>";
?>