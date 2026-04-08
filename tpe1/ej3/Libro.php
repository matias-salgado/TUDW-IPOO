<?php
// =======================
// Clase Libro
// =======================
class Libro {
    private $titulo;
    private $autor;
    private $disponible = true;
    private $cantidadPrestamos=0;

    public function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    // TODO: Crear un método prestar() que marque el libro como NO disponible
    //       pero solo si está disponible. Si ya está prestado, mostrar un mensaje de error.
    //      además, deberá actualizar la cantidad de veces que se prestó el libro.

    // TODO: Crear un método devolver() que lo marque como disponible nuevamente.

    // TODO: Crear un método mostrarInfo() que imprima: "Titulo (Autor) - Disponible/Prestado - y cantidad de Prestamos"
    
    // TODO: Crear un método estaDisponible() que devuelva true/false según corresponda.
    //       Pueden utilizar este método en algun lado? 

    // TODO: Crear los métodos setter y getters de todos los atributos.
}