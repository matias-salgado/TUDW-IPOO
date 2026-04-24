<?php

class Persona {
    protected int $dni;
    protected string $nombre;
    protected string $apellido;

    public function __construct(int $dni, string $nombre, string $apellido) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function setDni(int $dni) {
        $this->dni = $dni;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido) {
        $this->apellido = $apellido;
    }

    public function getDni(): int {
        return $this->dni;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function __toString(): string {
        $datos = "PERSONA:\n";
        $datos .= "DNI: " . $this->getDni() . "\n";
        $datos .= "Nombre: " . $this->getNombre() . "\n";
        $datos .= "Apellido: " . $this->getApellido() . "\n";

        return $datos;
    }
}