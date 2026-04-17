<?php

class Calculadora {
    private float $memoria = 0;
    private array $historial = [];

    public function __construct() {
        $this->memoria = 0;
    }

    public function setMemoria(float $valor) {
        $this->memoria = $valor;
    }

    public function setHistorial(array $historial) {
        $this->historial = $historial;
    }

    public function getMemoria() {
        return $this->memoria;
    }

    public function getHistorial() {
        return $this->historial;
    }

    public function sumar(float $a) {
        $memoria = $this->getMemoria();
        $resultado = $memoria + $a;
        $this->setMemoria($resultado);
        $historial = $this->getHistorial();
        $historial[] = $memoria . " + " . $a . " = " . $resultado;
        $this->setHistorial($historial);
    }

    public function restar(float $a) {
        $memoria = $this->getMemoria();
        $resultado = $memoria - $a;
        $this->setMemoria($resultado);
        $historial = $this->getHistorial();
        $historial[] = $memoria . " - " . $a . " = " . $resultado;
        $this->setHistorial($historial);
    }

    public function multiplicar(float $a) {
        $memoria = $this->getMemoria();
        $resultado = $memoria * $a;
        $this->setMemoria($resultado);
        $historial = $this->getHistorial();
        $historial[] = $memoria . " * " . $a . " = " . $resultado;
        $this->setHistorial($historial);
    }

    public function dividir(float $a) {
        if (!$a) {
            throw new Exception("Error matemático: no se puede dividir por 0");
        }

        $memoria = $this->getMemoria();
        $resultado = $memoria / $a;
        $this->setMemoria($resultado);
        $historial = $this->getHistorial();
        $historial[] = $memoria . " / " . $a . " = " . $resultado;
        $this->setHistorial($historial);
    }

    public function limpiarMemoria() {
        $this->setMemoria(0);
    }

    public function limpiarHistorial() {
        $this->setHistorial([]);
    }

    public function mostrarHistorial() {
        $historial = $this->getHistorial();
        $historialStr = "";

        foreach ($historial as $operacion) {
            $historialStr .= "> " . $operacion . "\n";
        }

        return $historialStr;
    }
}