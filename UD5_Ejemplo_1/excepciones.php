<?php
class DivisionPorCeroException extends Exception {}

function dividir($numerador, $denominador) {
    if($denominador == 0) {
        throw new DivisionPorCeroException("No se puede dividir por cero.");
    }
    return $numerador / $denominador;
}

try {
    echo dividir(10, 2) . "<br>"; // Resultado: 5
    echo dividir(10, 0) . "<br>"; // Esto lanzará una excepción
} catch (DivisionPorCeroException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
} finally {
    echo "Operación de división completada.<br>";
}
?>