<?php

namespace App\Tests\Entity;

use App\Entity\Exercise;
use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase
{
    /** @var Exercise */
    private $exerciseInstance;

    private $exerciseName = 'Exercise 1';

    public function setUp()
    {
        $this->exerciseInstance = new Exercise($this->exerciseName);
    }

    /** @test */
    public function itIsInstantiable(): void
    {
        $this->assertInstanceOf(Exercise::class, $this->exerciseInstance);
    }

    /** @test */
    public function itShouldReturnName(): void
    {
        $this->assertEquals($this->exerciseName, $this->exerciseInstance->name());
    }
}
