<?php
include "Libro.php";

// =======================
// Clase Biblioteca
// =======================
class Biblioteca {
    private string $nombre;
    /**
     * @var Libro[]
     */
    private array $libros = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function setNombre($elNombre) {
        $this->nombre = $elNombre;
    }

    public function setLibros($losLibros) {
        $this->libros = $losLibros;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getLibros() {
        return $this->libros;
    }

    // TODO: Crear un método agregarLibro($libro) que reciba un objeto Libro
    public function agregarLibro(Libro $libro) {
        $agregado = false;
        $librosActuales = $this->getLibros();

        $librosActuales[] = $libro;
        // Alternativa con array_push()
        // array_push($librosActuales, $libro);

        $this->setLibros($librosActuales);
        $agregado = true;

        return $agregado;
    }

    // TODO: Crear un método mostrarLibrosDisponibles() que liste solo los libros que están disponibles
    public function mostrarLibrosDisponibles() {
        $output = "";

        foreach ($this->getLibros() as $libro) {
            if ($libro->estaDisponible()) {
                $output .= $libro->mostrarInfo();
            }
        }

        return $output;
    }

    // TODO: Crear un método devolverTotalPrestamos() devuelva la cantidad de prestamos totales de la biblioteca
    public function devolverTotalPrestamos() {
        $cantPrestamosTotales = 0;
        
        foreach ($this->getLibros() as $libro) {
            $cantPrestamosTotales += $libro->getCantidadPrestamos();
        }

        return $cantPrestamosTotales;
    }
    
}

