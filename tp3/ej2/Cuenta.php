<?php
require_once __DIR__ . "/../ej1/Cliente.php";

abstract class Cuenta {
    protected Cliente $duenio;
    protected float $saldo;

    public function __construct(Cliente $duenio) {
        $this->duenio = $duenio;
        $this->saldo = 0;
    }

    public function setDuenio(Cliente $duenio) {
        $this->duenio = $duenio;
    }

    public function setSaldo(float $saldo) {
        $this->saldo = $saldo;
    }

    public function getDuenio(): Cliente {
        return $this->duenio;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function saldoCuenta(): string {
        return number_format($this->getSaldo(), 2, ',', '.');
    }

    public function realizarDeposito(float $monto): bool {
        $depositado = false;

        if ($monto > 0) {
            $saldoNuevo = $this->getSaldo() + $monto;
            $this->setSaldo($saldoNuevo);
            $depositado = true;
        }

        return $depositado;
    }

    public function __toString(): string {
        $datos = "CUENTA de ";
        $datos .= $this->getDuenio();
        $datos .= "----------\n";
        $datos .= "Saldo: " . $this->saldoCuenta() . "\n";

        return $datos;
    }

    abstract public function realizarRetiro(float $monto): bool;
}