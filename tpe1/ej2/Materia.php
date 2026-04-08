<?php
// =======================
// Clase Materia
// =======================
class Materia {
    private $nombre;
    private $notas = []; // un arreglo de enteros

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function setNombre($elNombre) {
        $this->nombre = $elNombre;
    }

    public function setNotas($lasNotas) {
        $this->notas = $lasNotas;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNotas() {
        return $this->notas;
    }

    // TODO: Crear un método agregarNota($nota) que sume una nota al array
    //       Validar que la nota esté entre 1 y 10 (si no, no se guarda)
    //       que ese método devuelva true/false para emitir un mensaje 
    //       en el programa principal en caso que no se haya podido ingresar la nota
    public function agregarNota(int $nota) {
        $agregada = false;

        if ($nota >= 1 && $nota <= 10) {
            $this->notas[] = $nota;
            $agregada = true;
        }

        return $agregada;
    }

    // TODO: Crear un método calcularPromedio() que devuelva el promedio de notas
    //       CUIDADO: ¿qué pasa si no hay notas todavía?
    public function calcularPromedio() {
        $cantNotas = count($this->getNotas());
        $promedio = 0;

        if ($cantNotas > 0) {
            $sumaNotas = 0;

            foreach ($this->getNotas() as $nota) {
                $sumaNotas = $sumaNotas + $nota;
            }

            $promedio = $sumaNotas / $cantNotas;
        }

        return $promedio; // Retornamos cero sino se puede calcular promedio
    }
    
}
