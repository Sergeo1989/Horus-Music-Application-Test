<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Adapter\CircleAdapter;
use App\Adapter\TriangleAdapter;
use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

Class GeometryCalculatorTest extends KernelTestCase {
    public function testTotalDiameters(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $geometryCalculator = $container->get('oaot.geometry_calculator');

        $circle = new Circle();
        $circle->setRadius(10);
        $circleAdapter = new CircleAdapter($circle);

        $triangle = new Triangle;
        $triangle->setA(10);
        $triangle->setB(15);
        $triangle->setC(20);
        $triangleAdapter = new TriangleAdapter($triangle);

        $circleAdapter = new CircleAdapter($circle);

        $this->assertSame(62.8319, round($circleAdapter->getDiameter(), 4));
        $this->assertSame(45.0, $triangleAdapter->getDiameter());
        
        $this->assertSame(107.8319, round($geometryCalculator->totalDiameters($circleAdapter, $triangleAdapter), 4));
        
    }

    public function testTotalAreas(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $geometryCalculator = $container->get('oaot.geometry_calculator');

        $circle = new Circle();
        $circle->setRadius(10);
        $circleAdapter = new CircleAdapter($circle);

        $triangle = new Triangle;
        $triangle->setA(10);
        $triangle->setB(15);
        $triangle->setC(20);
        $triangleAdapter = new TriangleAdapter($triangle);
        
        $this->assertSame(314.1593, round($circleAdapter->getSurface(), 4));
        $this->assertSame(72.6184, round($triangleAdapter->getSurface(), 4));

        $this->assertSame(386.7777, round($geometryCalculator->totalAreas($circleAdapter, $triangleAdapter), 4));
    }
}