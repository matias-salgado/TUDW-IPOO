<?php
include "Direccion.php";

// =======================
// Clase Alumno
// =======================
class Alumno {
    private string $nombre;
    private string $apellido;
    private Direccion $direccion; // Delegación -> un Alumno tiene una Direccion

    public function __construct(string $elNombre, string $elApellido, Direccion $laDireccion) {
        $this->nombre = $elNombre;
        $this->apellido = $elApellido;
        // TODO: Completar con los datos faltantes para inicializar todo el objeto completo
        $this->direccion = $laDireccion;
    }

    public function setNombre($elNombre) {
        $this->nombre = $elNombre;
    }

    public function setApellido($elApellido) {
        $this->apellido = $elApellido;
    }

    // TODO: Crear un método setDireccion($direccion) que reciba un objeto Direccion
    public function setDireccion(Direccion $laDireccion) {
        $this->direccion = $laDireccion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    // TODO: Crear un método mostrarDatos() que imprima el nombre, apellido y dirección completa del alumno
    public function mostrarDatos() {
        echo "Nombre: " . $this->getNombre() . "\n";
        echo "Apellido: " . $this->getApellido() . "\n";
        echo "Dirección: " . $this->direccion->getDireccionCompleta() . "\n";
    }
}
