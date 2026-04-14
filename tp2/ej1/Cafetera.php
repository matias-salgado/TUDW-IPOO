<?php

class Cafetera {
    private int $capacidadMaxima;
    private int $cantidadActual;

    public function __construct(int $capacidadMaxima, int $cantidadActual) {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = $cantidadActual;
    }

    public function setCapacidadMaxima(int $capacidadMaxima) {
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function setCantidadActual(int $cantidadActual) {
        $this->cantidadActual = $cantidadActual;
    }

    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }

    public function getCantidadActual() {
        return $this->cantidadActual;
    }

    public function llenarCafetera() {
        $capacidad = $this->getCapacidadMaxima();
        $this->setCantidadActual($capacidad);
    }

    public function servirTaza($capacidad) {
        $cantidadActual = $this->getCantidadActual();
        $llenada = $cantidadActual >= $capacidad;
        $cantidadActual = $llenada ? ($cantidadActual - $capacidad) : 0;
        $this->setCantidadActual($cantidadActual);

        return $llenada;
    }

    public function vaciarCafetera() {
        $vaciada = false;
        $this->setCantidadActual(0);
        $vaciada = true;

        return $vaciada;
    }

    public function agregarCafe($cantidad) {
        $agregado = false;
        $cantidadActual = $this->getCantidadActual();
        $nuevaCantidad = $cantidadActual + $cantidad;

        if ($this->getCapacidadMaxima() >= $nuevaCantidad) {
            $this->setCantidadActual($nuevaCantidad);
            $agregado = true;
        }

        return $agregado;
    }

    public function __toString() {
        $capacidadMaxima = $this->getCapacidadMaxima();
        $cantidadActual = $this->getCantidadActual();

        $estado = ($capacidadMaxima == $cantidadActual) ? "Llena" : ($cantidadActual > 0 ? "Con café" : "Vacía");
        $datos = "Capacidad máxima: " . $capacidadMaxima . "\n";
        $datos .= "Cantidad actual: " . $cantidadActual . " - " . $estado . "\n";

        return $datos;
    }
}