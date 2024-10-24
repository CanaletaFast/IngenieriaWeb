<?php
spl_autoload_register(function ($nombreClase) {
    include $nombreClase . '.php';
});

class Libro {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function mostrarTitulo() {
        echo "Título del libro: " . $this->titulo . "<br>";
    }
}

// Crear una instancia de la clase Libro sin incluir manualmente el archivo de clase
$libro = new Libro("El Principito");
$libro->mostrarTitulo();
?>