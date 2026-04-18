<?php
require_once __DIR__ . '/Locomotora.php';
require_once __DIR__ . '/Vagon.php';

class Formacion {
    private Locomotora $locomotora;
    /**
     * @var Vagon[]
     */
    private array $vagones = [];

    public function __construct(Locomotora $locomotora, array $vagones = []) {
        $this->locomotora = $locomotora;
        $this->vagones = $vagones;
    }
    
    public function setLocomotora(Locomotora $locomotora) {
        $this->locomotora = $locomotora;
    }

    public function setVagones(array $vagones) {
        $this->vagones = $vagones;
    }

    public function getLocomotora() {
        return $this->locomotora;
    }

    public function getVagones() {
        return $this->vagones;
    }

    public function __toString() {
        $datos = "Formación con:\n";
        $datos .= $this->getLocomotora()->__toString();
        $datos .= "Cantidad de vagones: " . count($this->getVagones()) . "\n";

        return $datos;
    }

    public function agregarVagon(Vagon $vagon): void {
        $this->vagones[] = $vagon;
    }

    public function incorporarPasajeroFormacion(int $cantPasajerosASumar): bool {
        $incorporados = false;
        $vagones = $this->getVagones();
        $cantVagones = count($vagones);
        $i = 0;

        while (!$incorporados && $i < $cantVagones) {
            $incorporados = $vagones[$i]->incorporarPasajeroVagon($cantPasajerosASumar);
            $i += 1;
        }

        return $incorporados;
    }

    public function cantidadPasajerosFormacion(): int {
        $sumaPasajeros = 0;
        $vagones = $this->getVagones();

        foreach ($vagones as $vagon) {
            $sumaPasajeros += $vagon->getCantidadPasajeros();
        }

        return $sumaPasajeros;
    }
}
