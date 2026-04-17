<?php

class FuncionTeatral {
    private string $nombre;
    /**
     * La hora y minuto de inicio de la función (en formato 24 horas)
     */
    private array $horaInicio = ["hora" => 0, "minuto" => 0];
    /**
     * La duración de la función teatral en minutos
     */
    private int $duracion;
    private float $precio;

    public function __construct(string $nombre, array $horaInicio, int $duracion, float $precio) {
        try {
            $this->nombre = $nombre;
            $this->setHoraInicio($horaInicio);
            $this->duracion = $duracion;
            $this->precio = $precio;
        } catch (Exception $e) {
            throw new Exception("Excepción creando Función Teatral: ". $e->getMessage());
        }
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function setHoraInicio(array $horaInicio) {
        $hora = $horaInicio["hora"];
        $minuto = $horaInicio["minuto"];

        if ($hora < 0 || $hora > 23) {
            throw new Exception("Hora inválida");
        }
        
        if ($minuto < 0 || $minuto > 59) {
            throw new Exception("Minuto inválido");
        }

        $this->horaInicio = $horaInicio;
    }

    public function setDuracion(int $duracion) {
        $this->duracion = $duracion;
    }

    public function setPrecio(float $precio) {
        $this->precio = $precio;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getHoraInicio() {
        return $this->horaInicio;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getPrecioFormatted() {
        return '$' . number_format($this->getPrecio(), 2, ',', '.');
    }

    public function __toString() {
        $horaInicio = $this->getHoraInicio();
        $datos = "Nombre de función: " . $this->getNombre() . "\n";
        $datos .= "Hora de inicio: " . $horaInicio["hora"] . ":" . $horaInicio["minuto"] . "\n";
        $datos .= "Duración: " . $this->getDuracion() . " minutos\n";
        $datos .= "Precio: " . $this->getPrecioFormatted() . "\n";

        return $datos;
    }

    public function horaInicioIguales(FuncionTeatral $otraFuncion) {
        $horaInicioEsta = $this->getHoraInicio();
        $horaInicioOtra = $otraFuncion->getHoraInicio();
        $horaIguales = $horaInicioEsta["hora"] === $horaInicioOtra["hora"];
        $minutoIguales = $horaInicioEsta["minuto"] === $horaInicioOtra["minuto"];

        return $horaIguales && $minutoIguales;
    }

    public function equals(FuncionTeatral $otraFuncion) {
        $igualesNombre = $this->getNombre() === $otraFuncion->getNombre();
        $igualesHoraInicio = $this->horaInicioIguales($otraFuncion);

        return $igualesNombre && $igualesHoraInicio;
    }
}