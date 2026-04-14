<?php

class CuentaBancaria {
    private int $nroCuenta;
    private int $dniCliente;
    private float $saldoActual;
    private float $interesAnual;

    public function __construct(int $nroCuenta, int $dniCliente, float $saldoActual, float $interesAnual) {
        $this->nroCuenta = $nroCuenta;
        $this->dniCliente = $dniCliente;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function setNroCuenta(int $nroCuenta) {
        $this->nroCuenta = $nroCuenta;
    }

    public function setDniCliente(int $dniCliente) {
        $this->dniCliente = $dniCliente;
    }

    public function setSaldoActual(float $saldoActual) {
        $this->saldoActual = $saldoActual;
    }

    public function setInteresAnual(float $interesAnual) {
        $this->interesAnual = $interesAnual;
    }

    public function getNroCuenta() {
        return $this->nroCuenta;
    }

    public function getDniCliente() {
        return $this->dniCliente;
    }

    public function getSaldoActual() {
        return $this->saldoActual;
    }

    public function getInteresAnual() {
        return $this->interesAnual;
    }

    public function actualizarSaldo() {
        $actualizado = false;

        // Calculamos el intéres diario
        $interesDiario = $this->getInteresAnual() / 365;

        // Actualizamos el saldo con el interés diario aplicado
        $saldoActualizado = $this->getSaldoActual() * (1 + $interesDiario);
        $this->setSaldoActual($saldoActualizado);

        $actualizado = true;

        return $actualizado;
    }

    public function depositar(float $cant) {
        $depositado = false;

        // Calculamos el nuevo saldo con la suma del depósito
        $nuevoSaldo = $this->getSaldoActual() + $cant;

        // Aplicamos nuevo saldo calculado
        $this->setSaldoActual($nuevoSaldo);

        $depositado = true;

        return $depositado;
    }

    public function retirar(float $cant) {
        $saldoActual = $this->getSaldoActual();
        $saldoNuevo = $saldoActual - $cant;
        $retirado = $saldoNuevo >= 0;

        if ($retirado) {
            $this->setSaldoActual($saldoNuevo);
        }

        return $retirado;
    }

    public function getNroCuentaFormatted() {
        return str_pad($this->getNroCuenta(), 5, "0", STR_PAD_LEFT);
    }

    public function getDniFormatted() {
        return number_format($this->getDniCliente(), 0, ',', '.');
    }

    public function getSaldoFormatted() {
        return '$' . number_format($this->getSaldoActual(), 2, ',', '.');
    }

    public function getInteresFormatted() {
        return number_format($this->getInteresAnual(), 2, ',', '.') . '%';
    }

    public function __toString() {
        $datos = "Número de cuenta: " . $this->getNroCuentaFormatted() . "\n";
        $datos .= "DNI del cliente: " . $this->getDniFormatted() . "\n";
        $datos .= "Saldo de la cuenta: " . $this->getSaldoFormatted() . "\n";
        $datos .= "Interés anual: " . $this->getInteresFormatted() . "\n";

        return $datos;
    }
}