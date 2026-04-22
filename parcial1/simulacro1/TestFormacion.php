<?php
require_once __DIR__ . '/Formacion.php';
require_once __DIR__ . '/Locomotora.php';
require_once __DIR__ . '/Vagon.php';

$locomotora = new Locomotora(188, 140);

$vagon1 = new Vagon(2000, 70, 3, 30, 25);

$vagon2 = new Vagon(2001, 80, 3, 40, 34);

$vagon3 = new Vagon(2002, 90, 3, 50, 50);

$formacion = new Formacion($locomotora, [$vagon1, $vagon2, $vagon3]);

if ($formacion->incorporarPasajeroFormacion(6)) {
    echo "Se han agregado los 6 pasajeros a la formación\n";
} else {
    echo "No se han agregado los pasajeros a la formación\n";
}

echo $vagon1;
echo "-------\n";
echo $vagon2;
echo "-------\n";
echo $vagon3;

if ($formacion->incorporarPasajeroFormacion(6)) {
    echo "Se han agregado los 14 pasajeros a la formación\n";
} else {
    echo "No se han agregado los pasajeros a la formación\n";
}

echo "Cantidad de pasajeros en la formación: " . $formacion->cantPasajerosFormacion() . "\n";

echo $locomotora;

echo $vagon1;
echo "-------\n";
echo $vagon2;
echo "-------\n";
echo $vagon3;

$vagon4 = new Vagon(2002, 90, 3, 25, 0);

$formacion->agregarVagon($vagon4);

echo $formacion;