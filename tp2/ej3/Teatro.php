<?php

class Teatro {
    private string $nombre;
    private string $direccion;
    private array $funciones = [];

    public function __construct(string $nombre, string $direccion, array $funciones) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->funciones = $funciones;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion(string $direccion) {
        $this->direccion = $direccion;
    }

    public function setFunciones(array $funciones) {
        $this->funciones = $funciones;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getFunciones() {
        return $this->funciones;
    }

    public function getFuncion(int $indiceFuncion) {
        $funciones = $this->getFunciones();
        $funcion = $funciones[$indiceFuncion];

        return $funcion;
    }

    public function setFuncion(int $indiceFuncion, $nuevaFuncion) {
        $funciones = $this->getFunciones();
        $funciones[$indiceFuncion] = $nuevaFuncion;
        $this->setFunciones($funciones);
    }

    public function actualizarNombreFuncion(int $indiceFuncion, string $nombre) {
        $funcion = $this->getFuncion($indiceFuncion);
        $funcion["nombre"] = $nombre;
        $this->setFuncion($indiceFuncion, $funcion);
    }

    public function actualizarPrecioFuncion(int $indiceFuncion, float $precio) {
        $funcion = $this->getFuncion($indiceFuncion);
        $funcion["precio"] = $precio;
        $this->setFuncion($indiceFuncion, $funcion);
    }

    public function incrementarPrecioFunciones(float $incremento) {
        $funciones = $this->getFunciones();

        foreach ($funciones as $i => $funcion) {
            $precio = $funcion["precio"];
            $precio += ($precio / 100) * $incremento;
            $funcion["precio"] = $precio;
            $this->setFuncion($i, $funcion);
        }
    }

    public function getPrecioFuncionFormatted($funcion) {
        return '$' . number_format($funcion["precio"], 2, ',', '.');
    }

    public function mostrarFuncion(array $funcion) {
        $datos = "Nombre de función: " . $funcion["nombre"] . "\n";
        $datos .= "Precio: " . $this->getPrecioFuncionFormatted($funcion) . "\n";

        return $datos;
    }

    public function mostrarFunciones() {
        $funciones = $this->getFunciones();
        $datos = "";

        foreach ($funciones as $funcion) {
            $datos .= $this->mostrarFuncion($funcion);
            $datos .= "-----\n";
        }

        return $datos;
    }

    public function __toString() {
        $datos = "Teatro: " . $this->getNombre() . "\n";
        $datos .= "Dirección: " . $this->getDireccion() . "\n";
        $datos .= "Cantidad de funciones: " . count($this->getFunciones()) . "\n";

        return $datos;
    }
}