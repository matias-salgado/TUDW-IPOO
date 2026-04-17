<?php
include('Calculadora.php');

function pedirOperacion(Calculadora $calculadora) {
    echo "Valor en memoria actual: " . $calculadora->getMemoria() . "\n";
    echo "¿Presevar valor? (Y/n): ";
    $respuesta = strtolower(trim(fgets(STDIN)));

    if ($respuesta == 'n') {
        $calculadora->limpiarMemoria();
        echo "Ingrese nuevo valor para memoria: ";
        $valor = (float) trim(fgets(STDIN));
        $calculadora->setMemoria($valor);
    }

    $operador = '';

    while (!$operador) {
        echo "Ingrese operador para operación (+, -, *, /): ";
        $operador = trim(fgets(STDIN));

        if (!in_array($operador, ['+', '-', '*', '/'])) {
            $operador = '';
        }
    }

    echo "Ingrese valor para operación: ";
    $valor = (float) trim(fgets(STDIN));

    switch ($operador) {
        case '+':
            $calculadora->sumar($valor);
            break;

        case '-':
            $calculadora->restar($valor);
            break;

        case '*':
            $calculadora->multiplicar($valor);
            break;
        
        case '/':
            try {
                $calculadora->dividir($valor);
            } catch (Exception $e) {
                echo "Error al intentar dividir: " . $e->getMessage() . "\n";
            }
            break;
        
        default:
            echo "Operación no admitida\n";
            break;
    }

    echo "Resultado: " . $calculadora->getMemoria() . "\n";

    echo "¿Mostrar historial? (Y/n): ";
    $respuesta = strtolower(trim(fgets(STDIN)));

    if ($respuesta == 'y') {
        echo $calculadora->mostrarHistorial();
    }
}

$calc = new Calculadora();
$jugar = true;

while ($jugar) {
    pedirOperacion($calc);

    echo "¿Seguir jugando? (Y/n): ";
    $respuesta = strtolower(trim(fgets(STDIN)));

    if ($respuesta == 'n') {
        $jugar = false;
    }
}

echo "\n¡Gracias por participar!\n";