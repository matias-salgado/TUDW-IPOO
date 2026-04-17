<?php
include('FuncionTeatral.php');

class Teatro {
    private string $nombre;
    private string $direccion;
    /**
     * @var FuncionTeatral[]
     */
    private array $funciones = [];

    public function __construct(string $nombre, string $direccion, array $funciones) {
        try {
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->setFunciones($funciones);
        } catch (Exception $e) {
            throw new Exception("Excepción construyendo Teatro: ". $e->getMessage());
        }
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion(string $direccion) {
        $this->direccion = $direccion;
    }

    public function setFunciones(array $funciones) {
        foreach ($funciones as $funcionArreglo) {
            if ($this->funcionSuperpone($funcionArreglo, $funciones)) {
                throw new Exception("Hay funciones teatrales que se superponen");
            }
        }
        $this->funciones = $funciones;
    }

    public function setFuncion(int $indiceFuncion, FuncionTeatral $nuevaFuncion) {
        $funciones = $this->getFunciones();
        $maxIndice = count($funciones) - 1;

        if ($indiceFuncion < 0 || $indiceFuncion > $maxIndice)
            throw new Exception("Error setteando función: posición fuera de rango (" . $indiceFuncion . ")");

        $funciones[$indiceFuncion] = $nuevaFuncion;
        
        try {
            $this->setFunciones($funciones);
        } catch (Exception $e) {
            throw new Exception("Excepción setteando función teatral: ". $nuevaFuncion->__toString() . "\n" . $e->getMessage());
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getFunciones() {
        return $this->funciones;
    }

    public function getFuncion(int $indiceFuncion) {
        $funciones = $this->getFunciones();
        $maxIndice = count($funciones) - 1;

        if ($indiceFuncion < 0 || $indiceFuncion > $maxIndice)
            throw new Exception("Error obteniendo función: posición fuera de rango (" . $indiceFuncion . ")");

        $funcion = $funciones[$indiceFuncion];

        return $funcion;
    }

    public function actualizarNombreFuncion(int $indiceFuncion, string $nombre) {
        try {
            $funcion = $this->getFuncion($indiceFuncion);
            $funcion->setNombre($nombre);
            $this->setFuncion($indiceFuncion, $funcion);
        } catch (Exception $e) {
            throw new Exception("Error en actualización de nombre: " . $e->getMessage());
        }
    }

    public function actualizarPrecioFuncion(int $indiceFuncion, float $precio) {
        try {
            $funcion = $this->getFuncion($indiceFuncion);
            $funcion->setPrecio($precio);
            $this->setFuncion($indiceFuncion, $funcion);
        } catch (Exception $e) {
            throw new Exception("Error en actualización de precio: " .  $e->getMessage());
        }
    }

    public function incrementarPrecioFunciones(float $incremento) {
        $funciones = $this->getFunciones();

        foreach ($funciones as $i => $funcion) {
            $precio = $funcion->getPrecio();
            $precio += ($precio / 100) * $incremento;
            try {
                $funcion->setPrecio($precio);
                $this->setFuncion($i, $funcion);
            } catch (Exception $e) {
                throw new Exception("Error en incremento de precio: " . $funcion->__toString() . "\nPrecio: " . $precio);
            }
        }
    }

    public function mostrarFunciones() {
        $funciones = $this->getFunciones();
        $datos = "";

        foreach ($funciones as $funcion) {
            $datos .= $funcion->__toString();
            $datos .= "-----\n";
        }

        return $datos;
    }

    public function __toString() {
        $datos = "Teatro: " . $this->getNombre() . "\n";
        $datos .= "Dirección: " . $this->getDireccion() . "\n";
        $datos .= "Cantidad de funciones: " . count($this->getFunciones()) . "\n";

        return $datos;
    }

    public function funcionSuperpone(FuncionTeatral $funcion, array $funciones) {
        $superpone = false;
        $cantFunciones = count($funciones);
        $i = 0;

        while (!$superpone && $i < $cantFunciones) {
            $funcionArreglo = $funciones[$i];
            if (!$funcion->equals($funcionArreglo)) { // No avanzamos si es "la misma" función teatral
                $superpone = $funcion->horaInicioIguales($funcionArreglo); // True si tienen misma hora de inicio
            }

            $i += 1;
        }

        return $superpone;
    }
}