<?php
require_once __DIR__ . "/Banco.php";
require_once __DIR__ . "/../ej1/Cliente.php";

$banco = new Banco();

$cliente1 = new Cliente(40_500_700, "Matias", "Salgado", 101_100);

$cliente2 = new Cliente(50_600_800, "Ezequiel", "Sepúlveda", 202_200);

if ($banco->incorporarCliente($cliente1)) {
    echo "Se agregó el cliente 1\n";
}

if ($banco->incorporarCliente($cliente2)) {
    echo "Se agregó el cliente 2\n";
}

$cuenta1 = $banco->incorporarCuentaCorriente($cliente1->getNroCliente(), 10_000);

if ($cuenta1) {
    echo "Cuenta Corriente asociada a cliente 1\n";
}

$cuenta2 = $banco->incorporarCuentaCorriente($cliente2->getNroCliente(), 5_000);

if ($cuenta1) {
    echo "Cuenta Corriente asociada a cliente 2\n";
}

$cuenta3 = $banco->incorporarCajaAhorro($cliente1->getNroCliente());

if ($cuenta3) {
    echo "Caja de Ahorro 1 asociada a cliente 1\n";
}

$cuenta4 = $banco->incorporarCajaAhorro($cliente1->getNroCliente());

if ($cuenta4) {
    echo "Caja de Ahorro 2 asociada a cliente 1\n";
}

$cuenta5 = $banco->incorporarCajaAhorro($cliente2->getNroCliente());

if ($cuenta5) {
    echo "Caja de ahorro asociada a cliente 2\n";
}

// Depositamos $350 a cada cuenta
$cuenta1->realizarDeposito(350);
$cuenta2->realizarDeposito(350);
$cuenta3->realizarDeposito(350);
$cuenta4->realizarDeposito(350);
$cuenta5->realizarDeposito(350);

// Transferimos de CC de cliente 1 a CA de cliente 2
$cuenta1->realizarRetiro(150);
$cuenta5->realizarDeposito(150);

// Mostramos los datos de cada Cuenta
echo $cuenta1 . "\n";
echo $cuenta2 . "\n";
echo $cuenta3 . "\n";
echo $cuenta4 . "\n";
echo $cuenta5 . "\n";