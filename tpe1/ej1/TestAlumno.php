<?php
include "Alumno.php";

// =======================
// Programa Principal
// =======================

// 1) Crear un objeto Direccion para "Av. Siempre Viva 742"
$primeraDireccion = new Direccion("Av. Siempre Viva", 742);

// 2) Crear un objeto Alumno llamado "Bart Simpson"
$alumnoBart = new Alumno("Bart", "Simpson", $primeraDireccion);

echo $alumnoBart->mostrarDatos(); // Muestra dirección original cargada desde el constructor

// 3) Asignar la dirección al alumno usando delegación
$segundaDireccion = new Direccion("Av. Siempre Triste", 247);

$alumnoBart->setDireccion($segundaDireccion); // Muestra nueva dirección cargada por setter

// 4) Mostrar los datos completos del alumno
echo $alumnoBart->mostrarDatos();
