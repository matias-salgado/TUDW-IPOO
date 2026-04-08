<?php

class Calculadora {
    private $memoria;

    // TODO: contructor

    public function getMemoria() {
        return $this->memoria;
    }

    public function setMemoria($valor) {
        $this->memoria = $valor;
    }

    public function sumar($a) {
        $this->setMemoria($this->getMemoria() + $a);
    }

    public function restar($a) {
        $this->setMemoria($this->getMemoria() - $a);
    }

    public function multiplicar($a) {
        $this->setMemoria($this->getMemoria() * $a);
    }

    public function dividir($a) {
        if ($a != 0)
            $this->setMemoria($this->getMemoria() / $a);
        else
            throw new Exception("Error matemático: no se puede dividir por 0");
    }

    public function limpiarMemoria() {
        $this->setMemoria(0);
    }
}

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;
    private $vueltas = [];

    // TODO: contructor

    public function getHoras() {
        return $this->horas;
    }

    public function getMinutos() {
        return $this->minutos;
    }

    public function getSegundos() {
        return $this->segundos;
    }

    public function setHoras($nuevoHoras) {
        $this->horas = $nuevoHoras;
    }

    public function setMinutos($nuevoMinutos) {
        $this->minutos = $nuevoMinutos;
    }

    public function setSegundos($nuevoSegundos) {
        $this->segundos = $nuevoSegundos;
    }

    public function puestaACero() {
        $this->setHoras(0);
        $this->setMinutos(0);
        $this->setSegundos(0);
    }

    public function incrementar() {
        $nuevoSegundos = $this->segundos + 1;
        $nuevoMinutos = $this->minutos;
        $nuevoHoras = $this->horas;

        if ($nuevoSegundos % 60 == 0) {
            $nuevoSegundos = 0;
            $nuevoMinutos++;
        }

        if ($nuevoMinutos % 60 == 0) {
            $nuevoMinutos = 0;
            $nuevoHoras++;
        }

        if ($nuevoHoras % 24 == 0) {
            $nuevoHoras = 0;
        }
        
        $this->setHoras($nuevoHoras);
        $this->setMinutos($nuevoMinutos);
        $this->setSegundos($nuevoSegundos);
    }

    public function setear($nuevoHoras, $nuevoMinutos, $nuevoSegundos) {
        if ($nuevoHoras >= 24)
            throw new Exception("Error: horas debe ser menor a 24");
        
        if ($nuevoMinutos >= 60)
            throw new Exception("Error: minutos debe ser menor a 60");

        if ($nuevoSegundos >= 60)
            throw new Exception("Error: segundos debe ser menor a 60");

        $this->setHoras($nuevoHoras);
        $this->setMinutos($nuevoMinutos);
        $this->setSegundos($nuevoSegundos);
    }

    public function mostrarReloj() {
        $strHoras = str_pad($this->getHoras(), 2, "0", STR_PAD_LEFT);
        $strMinutos = str_pad($this->getMinutos(), 2, "0", STR_PAD_LEFT);
        $strSegundos = str_pad($this->getSegundos(), 2, "0", STR_PAD_LEFT);
        echo $strHoras . ":" . $strMinutos . ":" . $strSegundos;
    }

    public function marcarVuelta() {
        $vuelta = [
            $this->horas,
            $this->minutos,
            $this->segundos,
        ];

        $this->vueltas[] = $vuelta;
    }

    public function limpiarVueltas() {
        $this->vueltas = [];
    }

    function strVuelta($vuelta) {
        $strHoras = str_pad($vuelta[0], 2, "0", STR_PAD_LEFT);
        $strMinutos = str_pad($vuelta[1], 2, "0", STR_PAD_LEFT);
        $strSegundos = str_pad($vuelta[2], 2, "0", STR_PAD_LEFT);
        return $strHoras . ":" . $strMinutos . ":" . $strSegundos;
    }

    public function mostrarVueltas() {
        for ($i = 0; $i < count($this->vueltas); $i++) {
            echo $this->strVuelta($this->vueltas[$i]);
        }
    }
}

class Fecha {
    private $dia;
    private $mes;
    private $anio;

    public static $meses = [
        ["enero", 31],
        ["febreo", 28],
        ["marzo", 31],
        ["abril", 30],
        ["mayo", 31],
        ["junio", 30],
        ["julio", 31],
        ["agosto", 31],
        ["septiembre", 30],
        ["octubre", 31],
        ["noviembre", 30],
        ["diciembre", 31],
    ];
    private static $INDICE_MES = 0;
    private static $INDICE_CANT_DIAS = 1;

    public function __construct($elDia, $elMes, $elAnio) {
        $this->dia = $elDia;
        $this->mes = $elMes;
        $this->anio = $elAnio;
    }

    public function getDia() {
        return $this->dia;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function setDia($elDia) {
        $this->dia = $elDia;
    }

    public function setMes($elMes) {
        $this->mes = $elMes;
    }

    public function setAnio($elAnio) {
        $this->anio = $elAnio;
    }

    private function esFebrero() {
        return $this->getMes() == 2;
    }

    private function esDiciembre() {
        return $this->getMes() == 12;
    }

    private function esAnioBiciesto() {
        $esMultiplo4 = $this->getAnio() % 4 == 0;
        $esMultiplo100 = $this->getAnio() % 100 == 0;
        $esMultiplo400 = $this->getAnio() % 400 == 0;

        return ($esMultiplo4 || $esMultiplo400) && !$esMultiplo100;
    }

    public function fechaFormatoAbreviado() {
        return $this->getDia() . "/" . $this->getMes() . "/" . $this->getAnio();
    }

    public function fechaFormatoExtendida() {
        return $this->getDia() . " de " . Fecha::$meses[$this->getMes() - 1][self::$INDICE_MES] . " de " . $this->getAnio();
    }

    public static function incrementar(int $cantDias, Fecha $fechaInicial) {
        $newDia = $fechaInicial->getDia();
        $newMes = $fechaInicial->getMes();
        $newAnio = $fechaInicial->getAnio();
        for ($i = 0; $i < $cantDias; $i++) {
            $fechaParcial = new Fecha($newDia, $newMes, $newAnio);
            $cantDiasCurrentMes = Fecha::$meses[$newMes - 1][self::$INDICE_CANT_DIAS];
            if ($fechaParcial->esFebrero() && $fechaParcial->esAnioBiciesto())
                $cantDiasCurrentMes + 1;

            if ($newDia + 1 <= $cantDiasCurrentMes) {
                // Estamos dentro del mismo mes
                $newDia = $newDia + 1;
                $fechaParcial->setDia($newDia);
            } else {
                // Pasamos de mes
                $newDia = 1;
                $fechaParcial->setDia(1);
                if ($fechaParcial->esDiciembre()) {
                    // Pasamos de año
                    $newMes = 1;
                    $newAnio = $newAnio + 1;
                    $fechaParcial->setMes($newMes);
                    $fechaParcial->setAnio($newAnio);
                } else {
                    $newMes = $newMes + 1;
                    $fechaParcial->setMes($newMes);
                }
            }
        }
        
        return new Fecha($newDia, $newMes, $newAnio); // con nuevos dias
    }

    public function __toString() {
        return "Fecha: " . $this->fechaFormatoAbreviado();
    }
}

class Login {
    private $nombreUsuario;
    private $contrasenia;
    private $recordatorio;
    private $ultimasContrasenias = [];

    public function setNombreUsuario($elNombreUsuario) {
        $this->nombreUsuario = $elNombreUsuario;
    }

    public function setContrasenia($laContrasenia) {
        $this->contrasenia = $laContrasenia;
    }

    public function setRecordatorio($elRecordatorio) {
        $this->recordatorio = $elRecordatorio;
    }

    public function setUltimasContrasenias($lasUltimasContrasenias) {
        $this->ultimasContrasenias = $lasUltimasContrasenias;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getRecordatorio() {
        return $this->recordatorio;
    }

    public function getUltimasContrasenias() {
        return $this->ultimasContrasenias;
    }
    
    public function validarContrasenia($intentoContrasenia) {
        return $this->getContrasenia() == $intentoContrasenia;
    }

    public function cambiarContrasenia($nuevaContrasenia) {
        $cambiada = false;

        if (!$this->existeEnUltimasContrasenias($nuevaContrasenia)) {
            $ultimaContrasenia = $this->getContrasenia();

            // Actualizamos contraseña actual
            $this->setContrasenia($nuevaContrasenia);

            // Quitamos la primera contraseña, la "más vieja"
            $nuevasUltimasContrasenias = array_shift($this->getUltimasContrasenias());
            // Agregamos la última contraseña más nueva al final
            $nuevasUltimasContrasenias[] = $ultimaContrasenia;
            $this->setUltimasContrasenias($nuevasUltimasContrasenias);
            $cambiada = true;
        }

        return $cambiada;
    }

    public function recordarContrasenia() {

    }

    private function existeEnUltimasContrasenias($contrasenia) {
        $existe = false;

        for ($i = 0; $i < count($this->ultimasContrasenias); $i++) {
            if ($this->ultimasContrasenias[$i] == $contrasenia)
                $existe = true;
        }

        return $existe;
    }
}