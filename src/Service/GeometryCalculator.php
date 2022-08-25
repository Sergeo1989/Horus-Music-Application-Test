<?php

namespace App\Service;

use App\Adapter\GeometricShapeAdapter;

class GeometryCalculator
{
    public function totalAreas(GeometricShapeAdapter $a, GeometricShapeAdapter $b)
    {
        return $a->getSurface() + $b->getSurface();
    }

    public function totalDiameters(GeometricShapeAdapter $a, GeometricShapeAdapter $b)
    {
        return $a->getDiameter() + $b->getDiameter();
    }
}