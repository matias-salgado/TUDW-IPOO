<?php

class Persona {
    private string $nombre;
    private string $apellido;
    private int $nroDocumento;

    public function __construct(string $nombre, string $apellido, int $nroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDocumento = $nroDocumento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNroDocumento($nroDocumento) {
        $this->nroDocumento = $nroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNroDocumento() {
        return $this->nroDocumento;
    }

    public function getDocumentoFormatted() {
        return number_format($this->getNroDocumento(), 0, ',', '.');
    }

    public function __toString() {
        $datos = "Persona con documento: " . $this->getDocumentoFormatted() . "\n";
        $datos .= "Nombre: " . $this->getNombre() . "\n";
        $datos .= "Apellido: " . $this->getApellido() . "\n";

        return $datos;
    }
}