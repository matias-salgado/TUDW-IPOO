<?php
include "Materia.php";

// =======================
// Clase Alumno
// =======================
class Alumno {
    private string $nombre;
    private string $apellido;
    /**
     * @var Materia[]
     */
    private array $materias = []; // un arreglo de objetos Materia

    public function __construct($nombre, $apellido) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function setNombre($elNombre) {
        $this->nombre = $elNombre;
    }

    public function setApellido($elApellido) {
        $this->apellido = $elApellido;
    }

    public function setMaterias($lasMaterias) {
        $this->materias = $lasMaterias;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getMaterias() {
        return $this->materias;
    }

    public function __toString() {
        $output = "Alumno: " . $this->getNombre() . " " . $this->getApellido() . "\n";
        $output .= "Cantidad de Materias: " . count($this->getMaterias()) . "\n";

        return $output;
    }

    // TODO: Crear un método agregarMateria($materia) que reciba un objeto Materia
    public function agregarMateria(Materia $materia) {
        $this->materias[] = $materia;
        // Alternativa con array_push()
        // array_push($this->materias, $materia);
    }

    // TODO: Crear un método mostrarMaterias() que liste el nombre de cada materia
    //       y su promedio de notas
    public function mostrarMaterias() {
        foreach ($this->getMaterias() as $materia) {
            echo "Materia: " . $materia->getNombre() . "\n";
            echo "Nota promedio: " . $materia->calcularPromedio() . "\n";
            echo "-----\n";
        }
    }

    // TODO EXTRA: Crear un método calcularPromedioGeneral() que saque el promedio de TODAS las materias
    public function calcularPromedioGeneral() {
        $cantMaterias = count($this->getMaterias());
        $promedioGeneral = 0;

        if ($cantMaterias > 0) {
            $sumaPromedios = 0;

            foreach ($this->getMaterias() as $materia) {
                $sumaPromedios = $sumaPromedios + $materia->calcularPromedio();
            }

            $promedioGeneral = $sumaPromedios / $cantMaterias;
        }

        return $promedioGeneral; // Retornamos cero sino se puede calcular promedio
    }
}
