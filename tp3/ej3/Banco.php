<?php
require_once __DIR__ . "/../ej1/Cliente.php";
require_once __DIR__ . "/../ej2/CuentaCorriente.php";
require_once __DIR__ . "/../ej2/CajaAhorro.php"; 

class Banco {
    /**
     * @var CuentaCorriente[]
     */
    private array $coleccionCuentaCorriente;
    /**
     * @var CajaAhorro[]
     */
    private array $coleccionCajaAhorro;
    /**
     * @var Cliente[]
     */
    private array $coleccionCliente;
    private int $ultimoNroCuenta;

    public function __construct() {
        $this->coleccionCliente = [];
        $this->coleccionCajaAhorro = [];
        $this->coleccionCuentaCorriente = [];
        $this->ultimoNroCuenta = 0;
    }

    public function setColeccionClientes(array $clientes): void {
        $this->coleccionCliente = $clientes;
    }

    public function setColeccionCuentasCorriente(array $cuentasCorrientes): void {
        $this->coleccionCuentaCorriente = $cuentasCorrientes;
    }

    public function setColeccionCajaAhorro(array $cajasAhorro): void {
        $this->coleccionCajaAhorro = $cajasAhorro;
    }

    public function setUltimoNroCuenta(int $numero) {
        $this->ultimoNroCuenta = $numero;
    }

    /**
     * @return Cliente[]
     */
    public function getColeccionClientes(): array {
        return $this->coleccionCliente;
    }

    /**
     * @return CuentaCorriente[]
     */
    public function getColeccionCuentasCorriente(): array {
        return $this->coleccionCuentaCorriente;
    }

    /**
     * @return CajaAhorro[]
     */
    public function getColeccionCajaAhorro(): array {
        return $this->coleccionCajaAhorro;
    }

    public function getUltimoNroCuenta() {
        return $this->ultimoNroCuenta;
    }

    public function incorporarCliente(Cliente $cliente): bool {
        $incorporado = false;

        $nrosClientes = array_map(fn($c) => $c->getNroCliente(), $this->getColeccionClientes());

        if (!in_array($cliente->getNroCliente(), $nrosClientes)) {
            $this->coleccionCliente[] = $cliente;

            $incorporado = true;
        }

        return $incorporado;
    }

    public function encontrarCliente(int $numeroCliente): ?Cliente {
        $existe = false;
        $clienteEncontrado = null;
        $clientes = $this->getColeccionClientes();
        $cantClientes = count($clientes);
        $i = 0;

        while (!$existe && $i < $cantClientes) {
            $cliente = $clientes[$i];
            $existe = $numeroCliente === $cliente->getNroCliente();
            $clienteEncontrado = $existe ? $cliente : null;
            $i++;
        }

        return $clienteEncontrado;
    }

    private function obtenerNuevoNroCuenta(): int {
        $nro = $this->getUltimoNroCuenta() + 1;
        $this->setUltimoNroCuenta($nro);
        return $nro;
    } 

    /**
     * @return CuentaCorriente|null
     */
    public function incorporarCuentaCorriente(int $numeroCliente, float $montoDescubierto) {
        $cuentaIncorporada = null;
        $cliente = $this->encontrarCliente($numeroCliente);

        if ($cliente && $montoDescubierto > 0) {
            $cuentaCorriente = new CuentaCorriente($cliente, $this->obtenerNuevoNroCuenta(), $montoDescubierto);
            $this->coleccionCuentaCorriente[] = $cuentaCorriente;
            $cuentaIncorporada = $cuentaCorriente;
        }

        return $cuentaIncorporada;
    }

    /**
     * @return CajaAhorro|null
     */
    public function incorporarCajaAhorro(int $numeroCliente) {
        $cuentaIncorporada = null;
        $cliente = $this->encontrarCliente($numeroCliente);

        if ($cliente) {
            $cajaAhorro = new CajaAhorro($cliente, $this->obtenerNuevoNroCuenta());
            $this->coleccionCuentaCorriente[] = $cajaAhorro;
            $cuentaIncorporada = $cajaAhorro;
        }

        return $cuentaIncorporada;
    }

    /**
     * @return CajaAhorro|CuentaCorriente
     */
    public function obtenerCuenta(int $nroCuenta) {
        $encontrada = false;
        $cuentaEncontrada = null;
        $coleccionCorriente = $this->getColeccionCuentasCorriente();
        $coleccionAhorro = $this->getColeccionCajaAhorro();
        $cantCorrientes = count($coleccionCorriente);
        $cantAhorros = count($coleccionAhorro);
        $i = 0;

        while (!$encontrada && $i < $cantCorrientes) {
            $encontrada = $coleccionCorriente[$i]->getNroCuenta() === $nroCuenta;
            $cuentaEncontrada = $encontrada ? $coleccionCorriente[$i] : null;
            $i++;
        }

        $i = 0;

        while (!$encontrada && $i < $cantAhorros) {
            $encontrada = $coleccionAhorro[$i]->getNroCuenta() === $nroCuenta;
            $cuentaEncontrada = $encontrada ? $coleccionAhorro[$i] : null;
            $i++;
        }

        return $cuentaEncontrada;
    }

    public function realizarDeposito(int $numeroCuenta, float $monto): bool {
        $depositado = false;
        $cuenta = $this->obtenerCuenta($numeroCuenta);

        if ($cuenta && $monto > 0) {
            $depositado = $cuenta->realizarDeposito($monto);
        }

        return $depositado;
    }

    public function realizarRetiro(int $numeroCuenta, float $monto): bool {
        $retirado = false;
        $cuenta = $this->obtenerCuenta($numeroCuenta);

        if ($cuenta && $monto > 0) {
            $retirado = $cuenta->realizarRetiro($monto);
        }

        return $retirado;
    }
}