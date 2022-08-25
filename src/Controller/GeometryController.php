<?php

namespace App\Controller;

use App\Adapter\CircleAdapter;
use App\Adapter\TriangleAdapter;
use App\Entity\Circle;
use App\Entity\Triangle;
use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeometryController extends AbstractController
{
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle();
        $triangle->setA($a);
        $triangle->setB($b);
        $triangle->setC($c);

        $ta = new TriangleAdapter($triangle);
        
        $response = [
            'type' =>'triangle',
            'a' => $triangle->getA(),
            'b' => $triangle->getB(),
            'c' => $triangle->getC(),
            'surface' => $ta->getSurface(),
            'circumference' => $ta->getDiameter(),
        ];

        return $this->json($response);
    }

    public function circle(float $radius): JsonResponse
    {
        $circle = new Circle();
        $circle->setRadius($radius);
        $ca = new CircleAdapter($circle);

        $response = [
            'type' =>'circle',
            'radius' => $circle->getRadius(),
            'surface' => $ca->getSurface(),
            'circumference' => $ca->getDiameter(),
        ];

        return $this->json($response);
    }

    public function sum(Kernel $kernel): JsonResponse
    {
        $geometryCalculator = $kernel->getContainer()->get('oaot.geometry_calculator');
        $circle = new Circle();
        $circle->setRadius(10);
        $ca = new CircleAdapter($circle);

        $triangle = new Triangle();
        $triangle->setA(2);
        $triangle->setB(5);
        $triangle->setC(9);

        $ta = new TriangleAdapter($triangle);

        $response = [
            'type' =>'circle',
            'total_surface' => $geometryCalculator->totalAreas($ca, $ta),
            'total_circumference' => $geometryCalculator->totalDiameters($ca, $ta),
        ];

        return $this->json($response);
    }
}
