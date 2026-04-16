<?php
include("Persona.php");

$persona1 = new Persona("Matias", "Salgado", 12432178);

echo $persona1;

$persona1->setNroDocumento(21467981);

echo "Nuevo documento: " . $persona1->getDocumentoFormatted(). "\n";

$persona1->setNombre("Tomás");

echo "Nuevo nombre: " . $persona1->getNombre(). "\n";

$persona1->setApellido("Castro");

echo "Nuevo apellido: " . $persona1->getApellido(). "\n";

echo $persona1;