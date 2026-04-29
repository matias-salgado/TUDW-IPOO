<?php
require_once __DIR__ . "/Persona.php";

class Cliente extends Persona {
    private int $nroCliente;

    public function __construct(int $dni, string $nombre, string $apellido, int $nroCliente) {
        parent::__construct($dni, $nombre, $apellido);
        $this->nroCliente = $nroCliente;
    }

    public function setNroCliente(int $nroCliente) {
        $this->nroCliente = $nroCliente;
    }

    public function getNroCliente(): int {
        return $this->nroCliente;
    }

    public function __toString(): string {
        $datos = "CLIENTE con ";
        $datos .= parent::__toString();
        $datos .= "Nro de cliente: " . $this->getNroCliente() . "\n";

        return $datos;
    }
}