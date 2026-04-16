<?php
include("Hamburguesa.php");

$pan = new Ingrediente("pan", "🥖", 42);
$tomate = new Ingrediente("tomate", "🍅", 15);
$lechuga = new Ingrediente("lechuga", "🥬", 16);
$carne = new Ingrediente("carne", "🥩", 100);
$huevo = new Ingrediente("huevo", "🥚", 50);

$ingredientes = [
    $pan,
    $tomate,
    $lechuga,
    $carne,
    $huevo
];

$hamburguesa1 = new Hamburguesa($ingredientes);

echo "Ingredientes de la hamburguesa: " . $hamburguesa1->listarIngredientes();

echo "Calorias totales: " . $hamburguesa1->calcularCalorias() . "\n";