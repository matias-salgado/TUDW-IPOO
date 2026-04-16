<?php
include("Libro.php");

function iguales(Libro $libro, array $arreglo) {
    $iguales = false;
    $i = 0;
    $cantLibros = count($arreglo);

    while (!$iguales && $i < $cantLibros) {
        $arregloLibro = $arreglo[$i];
        $iguales = $libro->equals($arregloLibro);

        $i += 1;
    }

    return $iguales;
}

function libroDeEditoriales(array $arregloLibros, string $editorial) {
    $librosEditorial = [];

    foreach ($arregloLibros as $libro) {
        if ($libro->getEditorial() == $editorial) {
            $librosEditorial[] = $libro;
        }
    }

    return $librosEditorial;
}

function mostrarLibros(array $arregloLibros) {
    $datos = "";

    foreach ($arregloLibros as $libro) {
        $datos .= $libro;
        $datos .= "-----\n";
    }

    return $datos;
}

$libro1 = new Libro(
    "84-7844-453-X",
    "Si una noche de invierno un viajero",
    2021,
    "Siruela",
    "Italo",
    "Calvino"
);

$libro2 = new Libro(
    "978-84-376-0494-7",
    "Cien años de soledad",
    2007,
    "Cátedra",
    "Gabriel",
    "García Márquez"
);

$libro3 = new Libro(
    "978-84-204-8367-3",
    "Rayuela",
    2013,
    "Alfaguara",
    "Julio",
    "Cortázar"
);

$libro4 = new Libro(
    "978-84-339-0800-3",
    "La sombra del viento",
    2001,
    "Planeta",
    "Carlos",
    "Ruiz Zafón"
);

$libro5 = new Libro(
    "978-84-204-2058-6",
    "El otoño del patriarca",
    2014,
    "Alfaguara",
    "Gabriel",
    "García Márquez"
);

$libro6 = new Libro(
    "978-84-322-0947-7",
    "Ensayo sobre la ceguera",
    2006,
    "Seix Barral",
    "José",
    "Saramago"
);

$libros = [$libro1, $libro2, $libro3, $libro4, $libro5, $libro6];

$libro7 = new Libro(
    "978-84-663-0184-2",
    "El túnel",
    2011,
    "Punto de Lectura",
    "Ernesto",
    "Sabato"
);

$libro8 = new Libro(
    "978-84-322-1483-9",
    "La ciudad y los perros",
    2012,
    "Seix Barral",
    "Mario",
    "Vargas Llosa"
);

$libro9 = new Libro(
    "978-84-397-2077-6",
    "Pedro Páramo",
    2010,
    "Espasa",
    "Juan",
    "Rulfo"
);

echo "Datos del libro 1:\n" . $libro1->__toString();

echo "Años desde la última edición (" . $libro1->getAnioEdicion() . "): " . $libro1->aniosDesdeEdicion() . "\n";

if ($libro1->perteneceEditorial("Billiken")) {
    echo "El libro pertenece a la editorial \"Billiken\"\n";
} else {
    echo "El libro NO pertenece a la editorial \"Billiken\"\n";
}

if ($libro1->perteneceEditorial($libro1->getEditorial())) {
    echo "El libro pertenece a la editorial \"" . $libro1->getEditorial() . "\"\n";
} else {
    echo "El libro NO pertenece a la editorial \"" . $libro1->getEditorial() . "\"\n";
}

if (iguales($libro7, $libros)) {
    echo "El libro \"" . $libro7->getTitulo() . "\" está en la colección de libros\n";
} else {
    echo "El libro \"" . $libro7->getTitulo() . "\" NO está en la colección de libros\n";
}

if (iguales($libro1, $libros)) {
    echo "El libro \"" . $libro1->getTitulo() . "\" está en la colección de libros\n";
} else {
    echo "El libro \"" . $libro1->getTitulo() . "\" NO está en la colección de libros\n";
}

$librosAlfaguara = libroDeEditoriales($libros, "Alfaguara");

if ($librosAlfaguara) {
    echo "Hay " . count($librosAlfaguara) . " libros de la editorial Alfaguara:\n";
    echo mostrarLibros($librosAlfaguara);
} else {
    echo "No hay libros de la editorial Alfaguara\n";
}

$librosTTL = libroDeEditoriales($libros, "Toma Tú Lugar");

if ($librosTTL) {
    echo "Hay " . count($librosTTL) . " libros de la editorial Toma Tú Lugar:\n";
    echo mostrarLibros($librosTTL);
} else {
    echo "No hay libros de la editorial Toma Tú Lugar\n";
}