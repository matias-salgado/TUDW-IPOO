<?php
include_once("Cuenta.php");

class CuentaCorriente extends Cuenta {
    private float $limiteDescubierto;

    public function __construct(Cliente $duenio, float $limiteDescubierto) {
        parent::__construct($duenio);
        $this->limiteDescubierto = $limiteDescubierto;
    }

    public function realizarRetiro(float $monto): bool {
        $retirado = false;

        if ($monto > 0) {
            $saldoNuevo = $this->getSaldo() - $monto;

            // Saldo luego del retiro debe ser mayor o igual al "piso"
            if ($saldoNuevo >= -($this->limiteDescubierto)) {
                $this->setSaldo($saldoNuevo);
                $retirado = true;
            }
        }

        return $retirado;
    }

    public function __toString(): string {
        $datos = parent::__toString();
        $datos .= "Tipo cuenta: CUENTA CORRIENTE\n";

        return $datos;
    }
}