<?php
require "Biblioteca.php";

/*Contexto:
Queremos modelar una Biblioteca que puede tener muchos Libros.
Cada libro tiene título, autor y un estado (disponible o prestado).
La biblioteca puede prestar libros y mostrar el listado de los que están disponibles.
*/

// =======================
// Programa Principal
// =======================

//  Crear una biblioteca llamada "Biblioteca Municipal"
$biblio = new Biblioteca("Biblioteca Municipal");

// Crear tres libros diferentes
$libro1 = new Libro("Cien Años de Soledad", "Gabriel García Márquez");
$libro2 = new Libro("El Principito", "Antoine de Saint-Exupéry");
$libro3 = new Libro("1984", "George Orwell");

// Agregar los libros a la biblioteca
$biblio->agregarLibro($libro1);
$biblio->agregarLibro($libro2);
$biblio->agregarLibro($libro3);

// Prestar el libro "El Principito"
$libro2->prestar();

// Mostrar los libros disponibles en la biblioteca
$biblio->mostrarLibrosDisponibles();

// Prestar el libro "Cien Años de Soledad"
$libro1->prestar();

// Prestar el libro "Cien Años de Soledad"
$libro1->prestar();

// Devolver el libro prestado y volver a mostrar la lista
$libro1->devolver();
$biblio->mostrarLibrosDisponibles();

// Prestar el libro "Cien Años de Soledad"
$libro1->prestar();

// Permitirle al usuario cargar un nuevo libro
echo "Ingrese el título de un libro: ";
$titulo = trim(fgets(STDIN));
echo "Ingrese el autor del libro: ";
$autor = trim(fgets(STDIN));

$libro4 = new Libro($titulo, $autor);
$biblio->agregarLibro($libro4);

// Prestar ese nuevo libro
$libro4->prestar();

// Mostrar los libros disponibles en la biblioteca
$biblio->mostrarLibrosDisponibles();

// Mostrar el total de préstamos realizados
echo "La biblioteca " . $biblio->getNombre() . " ha prestado " . $biblio->devolverTotalPrestamos() . " libros";

