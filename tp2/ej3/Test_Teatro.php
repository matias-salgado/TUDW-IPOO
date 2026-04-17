<?php
include("Teatro.php");

function solicitarFunciones(Teatro $teatro): array {
    $funcionesParaCargar = [];
    $finalizadaCarga = false;

    while (!$finalizadaCarga) {
        $funcion = solicitarFuncion();

        while ($teatro->funcionSuperpone($funcion, $funcionesParaCargar)) {
            echo "La función superpone con el inicio de otra. Por favor, cambie el horario\n";
            $funcion = solicitarFuncion();
        }

        $funcionesParaCargar[] = $funcion;

        echo "¿Desea ingresar otra función? (Y/n): ";
        $respuesta = trim(fgets(STDIN));

        if ($respuesta == 'n') {
            $finalizadaCarga = true;
        }
    }

    return $funcionesParaCargar;
}

function solicitarFuncion(): FuncionTeatral {
    $cargaCorrecta = false;

    while (!$cargaCorrecta) {
        echo "Ingrese el nombre de la función: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese la hora de inicio (0 a 23): ";
        $horaInicio = (int) trim(fgets(STDIN));
        echo "Ingrese el minuto de inicio (0 a 59): ";
        $minutoInicio = (int) trim(fgets(STDIN));
        echo "Ingrese la duración (en minutos): ";
        $duracion = (int) trim(fgets(STDIN));
        echo "Ingrese el precio: ";
        $precio = (float) trim(fgets(STDIN));

        try {
            $funcion = new FuncionTeatral(
                $nombre,
                ["hora" => $horaInicio, "minuto" => $minutoInicio],
                $duracion,
                $precio
            );
            $cargaCorrecta = true;
        } catch (Exception $e) {
            echo "Error creando Función Teatral: " . $e->getMessage() . "\n";
            echo "Por favor vuelva a cargar la función nuevamente.\n";
        }
    }

    return $funcion;
}

$funciones1 = [
    new FuncionTeatral("La nueva antorcha", ["hora" => 18, "minuto" => 0], 90, 10000),
    new FuncionTeatral("El viejo lobo", ["hora" => 19, "minuto" => 30], 110, 15000),
    new FuncionTeatral("La linda dama", ["hora" => 21, "minuto" => 30], 120, 20000),
    new FuncionTeatral("El loco malo", ["hora" => 23, "minuto" => 30], 80, 10000),
];

$teatro1 = new Teatro("Nueva Alianza Teatral", "Avenida Siempre Feliz 272", $funciones1);

echo $teatro1;

echo $teatro1->mostrarFunciones();

try {
    $teatro1->incrementarPrecioFunciones(50);
} catch(Exception $e) {
    echo "Error incrementando precio de función: " . $e->getMessage() . "\n";
}

echo $teatro1;

echo $teatro1->mostrarFunciones();

$funciones2 = [
    new FuncionTeatral("Sombras en la ciudad", ["hora" => 18, "minuto" => 0], 100, 12000),
    
    // Mismo horario que la anterior
    new FuncionTeatral("El juicio final", ["hora" => 18, "minuto" => 0], 90, 14000),
    
    new FuncionTeatral("Risas perdidas", ["hora" => 20, "minuto" => 15], 110, 18000),
    
    new FuncionTeatral("Noche sin estrellas", ["hora" => 22, "minuto" => 0], 95, 13000),
];

try {
    $teatro1->setFunciones($funciones2);
} catch (Exception $e) {
    echo "Error asignando nuevas funciones a Teatro: " . $e->getMessage() . "\n";
}

$funciones3 = solicitarFunciones($teatro1);

try {
    $teatro1->setFunciones($funciones3);
} catch (Exception $e) {
    echo "Error asignando nuevas funciones a Teatro: " . $e->getMessage() . "\n";
}

try {
    $teatro1->actualizarNombreFuncion(10, "Luz en la ciudad");
} catch (Exception $e) {
    echo "Error actualizando nombre de función: " . $e->getMessage() . "\n";
}

try {
    $teatro1->actualizarPrecioFuncion(0, -1000);
} catch (Exception $e) {
    echo "Error actualizando precio de función: " . $e->getMessage() . "\n";
}

try {
    $teatro1->actualizarNombreFuncion(0, "Luz en la ciudad");
} catch (Exception $e) {
    echo "Error actualizando nombre de función: " . $e->getMessage() . "\n";
}

try {
    $teatro1->actualizarPrecioFuncion(0, 4500);
} catch (Exception $e) {
    echo "Error actualizando precio de función: " . $e->getMessage() . "\n";
}

echo $teatro1->mostrarFunciones();