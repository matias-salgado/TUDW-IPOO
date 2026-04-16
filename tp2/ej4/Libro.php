<?php

class Libro {
    private string $isbn;
    private string $titulo;
    private int $anioEdicion;
    private string $editorial;
    private string $nombreAutor;
    private string $apellidoAutor;

    public function __construct(
        string $isbn,
        string $titulo,
        int $anioEdicion,
        string $editorial,
        string $nombreAutor,
        string $apellidoAutor
    ) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAnioEdicion($anioEdicion) {
        $this->anioEdicion = $anioEdicion;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function setNombreAutor($nombreAutor) {
        $this->nombreAutor = $nombreAutor;
    }

    public function setApellidoAutor($apellidoAutor) {
        $this->apellidoAutor = $apellidoAutor;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAnioEdicion() {
        return $this->anioEdicion;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getNombreAutor() {
        return $this->nombreAutor;
    }

    public function getApellidoAutor() {
        return $this->apellidoAutor;
    }

    public function __toString() {
        $datos = "ISBN: " . $this->getIsbn() . "\n";
        $datos .= "Título: " . $this->getTitulo() . "\n";
        $datos .= "Año de edición: " . $this->getAnioEdicion() . "\n";
        $datos .= "Editorial: " . $this->getEditorial() . "\n";
        $datos .= "Autor: " . $this->getNombreAutor() . " " . $this->getApellidoAutor() . "\n";

        return $datos;
    }

    public function equals(Libro $otroLibro) {
        $iguales = $otroLibro->getIsbn() === $this->getIsbn();

        return $iguales;
    }

    public function perteneceEditorial($editorial) {
        $pertenece = $this->getEditorial() == $editorial;

        return $pertenece;
    }

    public function aniosDesdeEdicion() {
        $anioHoy = (int) date("Y");
        $anios = $anioHoy - $this->getAnioEdicion();

        return $anios;
    }
}