<?php
include("CuentaBancaria.php");

$cuenta1 = new CuentaBancaria(101, 32410877, 1000000, 24);

echo $cuenta1;

$cuenta1->actualizarSaldo();

echo "El nuevo saldo es: " . $cuenta1->getSaldoFormatted() . "\n";

if ($cuenta1->depositar(500000)) {
    echo "Se ha depositado $500.000 a la cuenta\n";
} else {
    echo "No se ha podido depositar a la cuenta\n";
}

if ($cuenta1->retirar(1000000)) {
    echo "Se retiró de la cuenta, el nuevo saldo es: " . $cuenta1->getSaldoFormatted() . "\n";
} else {
    echo "No se ha podido retirar de la cuenta\n";
}

if ($cuenta1->retirar(1000000)) {
    echo "Se retiró de la cuenta, el nuevo saldo es: " . $cuenta1->getSaldoFormatted() . "\n";
} else {
    echo "No se ha podido retirar de la cuenta\n";
}

$cuenta1->actualizarSaldo();

echo $cuenta1;