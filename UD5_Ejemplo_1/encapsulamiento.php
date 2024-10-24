<?php
class CuentaBancaria {
    private $saldo;

    public function __construct($saldoInicial) {
        $this->saldo = $saldoInicial;
    }

    public function depositar($cantidad) {
        if($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Depósito de $" . $cantidad . " realizado.<br>";
        } else {
            echo "Cantidad inválida para depósito.<br>";
        }
    }

    public function retirar($cantidad) {
        if($cantidad > 0 && $cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
            echo "Retiro de $" . $cantidad . " realizado.<br>";
        } else {
            echo "Cantidad inválida para retiro o fondos insuficientes.<br>";
        }
    }

    public function obtenerSaldo() {
        echo "Saldo actual: $" . $this->saldo . "<br>";
    }
}

$cuenta = new CuentaBancaria(500);
$cuenta->obtenerSaldo();
$cuenta->depositar(150);
$cuenta->obtenerSaldo();
$cuenta->retirar(100);
$cuenta->obtenerSaldo();
$cuenta->retirar(600);
?>