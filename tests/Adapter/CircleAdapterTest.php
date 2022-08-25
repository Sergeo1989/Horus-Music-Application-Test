<?php

declare(strict_types=1);

use App\Adapter\CircleAdapter;
use App\Entity\Circle;
use PHPUnit\Framework\TestCase;

Class CircleAdapterTest extends TestCase {
    public function testGetDiameter(): void
    {
        $circle = new Circle();
        $circle->setRadius(10);
        $circleAdapter = new CircleAdapter($circle);
        $this->assertSame($circle, $circleAdapter->getCircle());
        $this->assertSame(10.0, $circleAdapter->getCircle()->getRadius());

        $this->assertSame(62.8319, round($circleAdapter->getDiameter(), 4));
    }

    public function testGetSurface(): void
    {
        $circle = new Circle();
        $circle->setRadius(10);
        $circleAdapter = new CircleAdapter($circle);
        $this->assertSame($circle, $circleAdapter->getCircle());
        $this->assertSame(10.0, $circleAdapter->getCircle()->getRadius());

        $this->assertSame(314.1593, round($circleAdapter->getSurface(), 4));
    }
}