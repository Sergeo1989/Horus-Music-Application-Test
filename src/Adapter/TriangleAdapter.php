<?php

namespace App\Adapter;
use App\Entity\Triangle;

Class TriangleAdapter implements GeometricShapeAdapter {
    private Triangle $triangle;

    public function __construct(Triangle $triangle) {
        $this->triangle = $triangle;
    }

    public function getTriangle() :Triangle
    {
        return $this->triangle;
    }

    public function getDiameter(): float
    {
        return $this->triangle->getA() + $this->triangle->getB() + $this->triangle->getC();
    }

    public function getSurface(): float
    {
        $d = $this->getDiameter() / 2;
        return sqrt( $d * ($d - $this->triangle->getA()) * ($d - $this->triangle->getB()) *($d - $this->triangle->getC()) );        
    }
}