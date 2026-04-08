<?php
include "ejercicio09.php";

$fecha1 = new Fecha(19, 12, 2000);

echo $fecha1->fechaFormatoExtendida() . "\n";

$fecha2 = Fecha::incrementar(15, $fecha1);

echo $fecha2->fechaFormatoExtendida() . "\n";

echo $fecha2 . "\n";

echo $fecha2->__toString();
?>