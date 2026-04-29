<?php
include_once("Cuenta.php");

class CajaAhorro extends Cuenta {

    public function __construct(Cliente $duenio) {
        parent::__construct($duenio);
        $this->duenio = $duenio;
    }

    public function realizarRetiro(float $monto): bool {
        $retirado = false;

        if ($monto > 0) {
            $saldoNuevo = $this->getSaldo() - $monto;

            // Saldo luego del retiro debe ser mayor o igual al "piso"
            if ($saldoNuevo >= 0) {
                $this->setSaldo($saldoNuevo);
                $retirado = true;
            }
        }

        return $retirado;
    }

    public function __toString(): string {
        $datos = parent::__toString();
        $datos .= "Tipo cuenta: CAJA DE AHORRO\n";

        return $datos;
    }
}