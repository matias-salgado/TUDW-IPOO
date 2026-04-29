<?php
require_once __DIR__ . "/CajaAhorro.php";
require_once __DIR__ . "/CuentaCorriente.php";
require_once __DIR__ . "/../ej1/Cliente.php";

$cliente1 = new Cliente(42_100_100, "Matias", "Salgado", 10_400);

$cliente2 = new Cliente(52_300_300, "Ezequiel", "Sepúlveda", 20_100);

$cuenta1 = new CajaAhorro($cliente1);

$cuenta2 = new CuentaCorriente($cliente2, 1_000_000);

// Seteamos saldos iniciales

$cuenta1->realizarDeposito(500_000);

$cuenta2->realizarDeposito(500_000);

// Realizamos retiros

if ($cuenta1->realizarRetiro(250_000)) {
    echo "Cliente 1 ha retirado $250.000\n";
} else {
    echo "Cliente 1 no ha podido retirar\n";
}

if ($cuenta2->realizarRetiro(350_000)) {
    echo "Cliente 2 ha retirado $350.000\n";
} else {
    echo "Cliente 2 no ha podido retirar\n";
}

if ($cuenta1->realizarRetiro(250_000)) {
    echo "Cliente 1 ha retirado $250.000\n";
} else {
    echo "Cliente 1 no ha podido retirar\n";
}

if ($cuenta2->realizarRetiro(350_000)) {
    echo "Cliente 2 ha retirado $350.000\n";
} else {
    echo "Cliente 2 no ha podido retirar\n";
}

// Revisamos cuentas

echo $cuenta1;

echo "\n";

echo $cuenta2;