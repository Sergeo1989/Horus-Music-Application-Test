<?php

namespace App\Adapter;
use App\Entity\Circle;

Class CircleAdapter implements GeometricShapeAdapter {
    private Circle $circle;

    public function __construct(Circle $circle) {
        $this->circle = $circle;
    }

    public function getCircle() :Circle
    {
        return $this->circle;
    }

    public function getDiameter(): float
    {
        return $this->circle->getRadius() * pi() * 2;
    }

    public function getSurface(): float
    {
        return pow($this->circle->getRadius(), 2) * pi();      
    }
}