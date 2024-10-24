<?php
abstract class Forma {
    abstract public function dibujar();
}

class Circulo extends Forma {
    public function dibujar() {
        echo "Dibujando un círculo.<br>";
    }
}

class Cuadrado extends Forma {
    public function dibujar() {
        echo "Dibujando un cuadrado.<br>";
    }
}

function renderizarForma(Forma $forma) {
    $forma->dibujar();
}

$circulo = new Circulo();
$cuadrado = new Cuadrado();

renderizarForma($circulo);
renderizarForma($cuadrado);
?>