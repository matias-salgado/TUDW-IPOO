<?php
// =======================
// Clase Direccion
// =======================
class Direccion {
    private string $calle;
    private int $numero;

    public function __construct(string $calle, int $numero) {
        $this->calle = $calle;
        $this->numero = $numero;
    }

    public function setCalle($laCalle) {
        $this->calle = $laCalle;
    }

    public function setNumero($elNumero) {
        $this->numero = $elNumero;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumero() {
        return $this->numero;
    }

    // TODO: Crear un método getDireccionCompleta() que devuelva "Calle Numero"
    public function getDireccionCompleta() {
        return $this->calle . " " . $this->numero;
    }
}