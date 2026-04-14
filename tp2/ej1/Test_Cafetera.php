<?php
include("Cafetera.php");

$cafetera = new Cafetera(100, 0);

if ($cafetera->servirTaza(10)) {
    echo "Se pudo servir la taza de 10\n";
} else {
    echo "No se pudo llenar la taza de 10\n";
}

$cafetera->llenarCafetera(); // Llenamos la cafetera

if ($cafetera->servirTaza(10)) {
    echo "Se pudo servir la taza de 10\n";
} else {
    echo "No se pudo llenar la taza de 10\n";
}

echo $cafetera;

if ($cafetera->servirTaza(15)) {
    echo "Se pudo servir la taza de 15\n";
} else {
    echo "No se pudo llenar la taza de 15\n";
}

if ($cafetera->servirTaza(20)) {
    echo "Se pudo servir la taza de 20\n";
} else {
    echo "No se pudo llenar la taza de 20\n";
}

echo $cafetera;

if ($cafetera->agregarCafe(20)) {
    echo "Se pudo agregar café a la cafetera\n";
} else {
    echo "No se pudo agregar café a la cafetera\n";
}

if ($cafetera->agregarCafe(20)) {
    echo "Se pudo agregar café a la cafetera\n";
} else {
    echo "No se pudo agregar café a la cafetera\n";
}

if ($cafetera->agregarCafe(20)) {
    echo "Se pudo agregar café a la cafetera\n";
} else {
    echo "No se pudo agregar café a la cafetera\n";
}

if ($cafetera->vaciarCafetera()) {
    echo "Se vació la cafetera\n";
}

echo $cafetera;