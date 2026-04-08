<?php
include "Alumno.php";

// =======================
// Programa Principal
// =======================

// 1) Crear un Alumno "Lisa Simpson"
$alumnoLisa = new Alumno("Lisa", "Simpson");

// 2) Crear dos materias: "Matemática" y "Música"
$matematica = new Materia("Matemática");
$musica = new Materia("Música");

// 3) Agregar algunas notas a cada materia. Modificar las sentencias siguientes
//      si la nota no se pudo agregar
if (!$matematica->agregarNota(10))
    echo "ERROR: nota fuera de rango\n";
if (!$matematica->agregarNota(9))
    echo "ERROR: nota fuera de rango\n";
if (!$matematica->agregarNota(11))
    echo "ERROR: nota fuera de rango\n"; // deberia dar ERROR: nota fuera de rango
if (!$matematica->agregarNota(20))
    echo "ERROR: nota fuera de rango\n";; // deberia dar ERROR: nota fuera de rango

if (!$musica->agregarNota(8))
    echo "ERROR: nota fuera de rango\n";
if (!$musica->agregarNota(7))
    echo "ERROR: nota fuera de rango\n";
if (!$musica->agregarNota(15))
    echo "ERROR: nota fuera de rango\n"; // deberia dar ERROR: nota fuera de rango
if (!$musica->agregarNota(-1))
    echo "ERROR: nota fuera de rango\n";; // deberia dar ERROR: nota fuera de rango

// 4) Asignar las materias al alumno 
$alumnoLisa->agregarMateria($matematica);
$alumnoLisa->agregarMateria($musica);

// 5) Mostrar los datos de Lisa y el promedio general
echo $alumnoLisa;
echo "Promedio general materias: " . $alumnoLisa->calcularPromedioGeneral() . "\n";

// 6) Mostrar las materias y calcular el promedio general
$alumnoLisa->mostrarMaterias();

