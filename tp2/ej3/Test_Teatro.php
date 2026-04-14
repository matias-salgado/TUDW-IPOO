<?php
include("Teatro.php");

$funciones = [
    ["nombre" => "La nueva antorcha", "precio" => 10000],
    ["nombre" => "El viejo lobo", "precio" => 15000],
    ["nombre" => "La linda dama", "precio" => 20000],
    ["nombre" => "El loco malo", "precio" => 10000],
];

$teatro1 = new Teatro("Nueva Alianza Teatral", "Avenida Siempre Feliz 272", $funciones);

echo $teatro1;

echo $teatro1->mostrarFunciones();

$teatro1->incrementarPrecioFunciones(50);

echo $teatro1;

echo $teatro1->mostrarFunciones();