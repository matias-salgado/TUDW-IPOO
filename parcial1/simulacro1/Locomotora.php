<?php

class Locomotora {
    private float $peso;        // En toneladas
    private int $maxVelocidad;  // En kilómetros/hora

    public function __construct(float $peso, int $maxVelocidad) {
        $this->peso = $peso;
        $this->maxVelocidad = $maxVelocidad;
    }

    public function setPeso(float $peso) {
        $this->peso = $peso;
    }

    public function setMaxVelocidad(int $maxVelocidad) {
        $this->maxVelocidad = $maxVelocidad;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getMaxVelocidad() {
        return $this->maxVelocidad;
    }

    public function __toString() {
        $datos = "Locomotora con peso: " . $this->getPeso() . " toneladas\n";
        $datos .= "Velocidad máxima: " . $this->getMaxVelocidad() . "km/h\n";

        return $datos;
    }
}