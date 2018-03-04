<?php

namespace App\Tests\Entity;

use App\Entity\Exercise;
use App\Entity\ExerciseInTraining;
use App\Entity\Training;
use PHPUnit\Framework\TestCase;

class ExerciseInTrainingTest extends TestCase
{
    private $exerciseProphecy;
    private $trainingProphecy;

    /**
     *
     */
    public function setUp()
    {
        $this->generateExerciseProphecy();
        $this->generateTrainingProphecy();
    }

    /** @test */
    public function itIsInstantiable(): void
    {
        $instance = new ExerciseInTraining($this->exerciseProphecy, $this->trainingProphecy);

        $this->assertInstanceOf(ExerciseInTraining::class, $instance);
    }

    private function generateExerciseProphecy(): void
    {
        $this->exerciseProphecy = $this->prophesize(Exercise::class)->reveal();
    }

    private function generateTrainingProphecy(): void
    {
        $this->trainingProphecy = $this->prophesize(Training::class)->reveal();
    }
}
