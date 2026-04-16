<?php
include("Ingrediente.php");

class Hamburguesa {
    /**
     * @var Ingrediente[]
     */
    private array $ingredientes = [];

    public function __construct($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function calcularCalorias() {
        $sumaCalorias = 0;
        $ingredientes = $this->getIngredientes();

        foreach ($ingredientes as $ingrediente) {
            $sumaCalorias += $ingrediente->getCalorias();
        }

        return $sumaCalorias;
    }

    public function listarIngredientes() {
        $listado = "";
        $ingredientes = $this->getIngredientes();

        foreach ($ingredientes as $ingrediente) {
            $listado .= $ingrediente->getEmoji() . " " .$ingrediente->getNombre() . ", ";
        }

        $listado .= "\n";

        return $listado;
    }
}