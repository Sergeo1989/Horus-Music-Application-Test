<?php

namespace App\Adapter;

interface GeometricShapeAdapter {
    public function getSurface(): float;

    public function getDiameter(): float;
}