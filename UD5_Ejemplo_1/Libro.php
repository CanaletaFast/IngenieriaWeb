<?php
class Libro {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function mostrarTitulo() {
        echo "Título del libro: " . $this->titulo . "<br>";
    }
}
?>