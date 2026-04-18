<?php

const PESO_PROMEDIO_PASAJEROS = 80; // Por enunciado

class Vagon {
    private int $anioInstalacion;
    private float $largo;
    private float $ancho;
    private float $peso;
    private int $cantidadMaximaPasajeros;
    private int $cantidadPasajeros;

    public function __construct(
        int $anioInstalacion,
        float $largo,
        float $ancho,
        int $cantidadMaximaPasajeros,
        int $cantidadPasajeros
    ) {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->peso = $cantidadPasajeros * PESO_PROMEDIO_PASAJEROS;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->cantidadPasajeros = $cantidadPasajeros;
    }

    public function setAnioInstalacion(int $anioInstalacion) {
        $this->anioInstalacion = $anioInstalacion;
    }

    public function setLargo(float $largo) {
        $this->largo = $largo;
    }

    public function setAncho(float $ancho) {
        $this->ancho = $ancho;
    }

    public function setPeso(float $peso) {
        $this->peso = $peso;
    }

    public function setCantidadMaximaPasajeros(int $cantidadMaximaPasajeros) {
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    }

    public function setCantidadPasajeros(int $cantidadPasajeros) {
        $this->cantidadPasajeros = $cantidadPasajeros;
    }

    public function getAnioInstalacion() {
        return $this->anioInstalacion;
    }

    public function getLargo() {
        return $this->largo;
    }

    public function getAncho() {
        return $this->ancho;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getCantidadMaximaPasajeros() {
        return $this->cantidadMaximaPasajeros;
    }

    public function getCantidadPasajeros() {
        return $this->cantidadPasajeros;
    }

    public function __toString() {
        $datos = "Vagón con año de instalación: " . $this->getAnioInstalacion() . "\n";
        $datos .= "Largo: " . $this->getLargo() . "\n";
        $datos .= "Ancho: " . $this->getAncho() . "\n";
        $datos .= "Peso: " . $this->getPeso() . "\n";
        $datos .= "Cant. máxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n";
        $datos .= "Cant. actual de pasajeros: " . $this->getCantidadPasajeros() . "\n";

        return $datos;
    }

    public function incorporarPasajeroVagon(int $cantPasajerosASumar) {
        $capacidadMaxima = $this->getCantidadMaximaPasajeros();
        $cantActual = $this->getCantidadPasajeros();
        $cantSumada = $cantActual + $cantPasajerosASumar;
        $incorporados = $cantSumada <= $capacidadMaxima;
        $pesoNuevo = $cantSumada * PESO_PROMEDIO_PASAJEROS;

        if ($incorporados) {
            $this->setCantidadPasajeros($cantSumada);
            $this->setPeso($pesoNuevo);
        }

        return $incorporados;
    }
}