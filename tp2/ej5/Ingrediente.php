<?php

class Ingrediente {
    private string $nombre;
    private string $emoji;
    private int $calorias;

    public function __construct(string $nombre, string $emoji, int $calorias) {
        $this->nombre = $nombre;
        $this->emoji = $emoji;
        $this->calorias = $calorias;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCalorias($calorias) {
        $this->calorias;
    }

    public function setEmoji($emoji) {
        $this->emoji = $emoji;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCalorias() {
        return $this->calorias;
    }

    public function getEmoji() {
        return $this->emoji;
    }
}