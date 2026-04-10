<?php
// =======================
// Clase Libro
// =======================
class Libro {
    private string $titulo;
    private string $autor;
    private bool $disponible = true;
    private int $cantidadPrestamos = 0;

    public function __construct(string $titulo, string $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    // TODO: Crear los métodos setter y getters de todos los atributos.

    public function setTitulo($elTitulo) {
        $this->titulo = $elTitulo;
    }

    public function setAutor($elAutor) {
        $this->autor = $elAutor;
    }

    public function setDisponible($elDisponible) {
        $this->disponible = $elDisponible;
    }

    public function setCantidadPrestamos($laCantidadPrestamos) {
        $this->cantidadPrestamos = $laCantidadPrestamos;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getDisponible() {
        return $this->disponible;
    }

    public function getCantidadPrestamos() {
        return $this->cantidadPrestamos;
    }

    // TODO: Crear un método prestar() que marque el libro como NO disponible
    //       pero solo si está disponible. Si ya está prestado, mostrar un mensaje de error.
    //      además, deberá actualizar la cantidad de veces que se prestó el libro.
    // Nota alumno: Es mejor práctica que el programa principal muestre el mensaje del error.
    public function prestar() {
        $prestado = false;

        if ($this->disponible) {
            $this->setDisponible(false);
            $nuevaCantidadPrestamos = $this->getCantidadPrestamos() + 1;
            $this->setCantidadPrestamos($nuevaCantidadPrestamos);
            $prestado = true;
        }

        return $prestado; // `false` si el libro ya está prestado y el programa principal muestra el error
    }

    // TODO: Crear un método devolver() que lo marque como disponible nuevamente.
    public function devolver() {
        $devuelto = false;

        if (!$this->disponible) {
            $this->setDisponible(true);
            $devuelto = true;
        }

        return $devuelto;
    }

    // TODO: Crear un método mostrarInfo() que imprima: "Titulo (Autor) - Disponible/Prestado - y cantidad de Prestamos"
    public function mostrarInfo() {
        $estado = $this->getDisponible() ? "Disponible" : "Prestado";
        return $this->getTitulo() . " (" . $this->getAutor() . ") - " . $estado . " - Prestado " . $this->getCantidadPrestamos() . " veces\n"; 
    }

    // TODO: Crear un método estaDisponible() que devuelva true/false según corresponda.
    //       Pueden utilizar este método en algun lado?
    public function estaDisponible() {
        return $this->getDisponible();
    }
}