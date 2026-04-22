<?php

const PESO_PROMEDIO_PASAJEROS = 80; // Por enunciado

class Vagon {
    private int $anioInstalacion;
    private float $largo;
    private float $ancho;
    private float $peso;
    private int $cantMaxPasajeros;
    private int $cantPasajeros;

    public function __construct(
        int $anioInstalacion,
        float $largo,
        float $ancho,
        int $cantMaxPasajeros,
        int $cantPasajeros
    ) {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->peso = $this->calcularPeso($cantPasajeros);
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->cantPasajeros = $cantPasajeros;
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

    public function setCantMaxPasajeros(int $cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function setCantPasajeros(int $cantPasajeros) {
        $this->cantPasajeros = $cantPasajeros;
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

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }

    public function getCantPasajeros() {
        return $this->cantPasajeros;
    }

    private function calcularPeso(int $cantPasajeros) {
        return $cantPasajeros * PESO_PROMEDIO_PASAJEROS;
    }

    public function __toString() {
        $datos = "Vagón con año de instalación: " . $this->getAnioInstalacion() . "\n";
        $datos .= "Largo: " . $this->getLargo() . "\n";
        $datos .= "Ancho: " . $this->getAncho() . "\n";
        $datos .= "Peso: " . $this->getPeso() . "\n";
        $datos .= "Cant. máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\n";
        $datos .= "Cant. actual de pasajeros: " . $this->getCantPasajeros() . "\n";

        return $datos;
    }

    public function incorporarPasajeroVagon(int $cantPasajerosASumar) {
        $capacidadMaxima = $this->getCantMaxPasajeros();
        $cantActual = $this->getCantPasajeros();
        $cantSumada = $cantActual + $cantPasajerosASumar;
        $incorporados = $cantSumada <= $capacidadMaxima;
        $pesoNuevo = $this->calcularPeso($cantSumada);

        if ($incorporados) {
            $this->setCantPasajeros($cantSumada);
            $this->setPeso($pesoNuevo);
        }

        return $incorporados;
    }
}