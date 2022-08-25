<?php

declare(strict_types=1);

use App\Adapter\TriangleAdapter;
use App\Entity\Triangle;
use PHPUnit\Framework\TestCase;

Class TriangleAdapterTest extends TestCase {
    public function testGetDiameter(): void
    {
        $triangle = new Triangle();
        $triangle->setA(10);
        $triangle->setB(15);
        $triangle->setC(20);
        $triangleAdapter = new TriangleAdapter($triangle);
        $this->assertSame($triangle, $triangleAdapter->getTriangle());
        $this->assertSame(10.0, $triangleAdapter->getTriangle()->getA());
        $this->assertSame(15.0, $triangleAdapter->getTriangle()->getB());
        $this->assertSame(20.0, $triangleAdapter->getTriangle()->getC());

        $this->assertSame(45.0, $triangleAdapter->getDiameter());
    }

    public function testGetSurface(): void
    {
        $triangle = new Triangle();
        $triangle->setA(10);
        $triangle->setB(15);
        $triangle->setC(20);
        $triangleAdapter = new TriangleAdapter($triangle);

        $this->assertSame(72.6184, round($triangleAdapter->getSurface(), 4));
    }
}