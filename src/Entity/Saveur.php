<?php

namespace App\Entity;

class Saveur
{
    private string $label;

    public function __construct(string $label) {
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}