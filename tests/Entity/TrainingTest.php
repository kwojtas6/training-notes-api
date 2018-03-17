<?php

namespace App\Tests\Entity;

use App\Entity\Exercise;
use App\Entity\ExerciseInTraining;
use App\Entity\GymGoer;
use App\Entity\Training;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase
{
    /** @var Training */
    private $trainingInstance;

    /** @var string */
    private $name = 'Training name';

    private $gymGoerProphecy;
    private $exerciseProphecy;

    public function setUp()
    {
        $this->generateGymGoerProphecy();
        $this->generateExerciseProphecy();

        $this->trainingInstance = new Training($this->gymGoerProphecy, $this->name);
    }

    /** @test */
    public function itIsInstantiable(): void
    {
        $this->assertInstanceOf(Training::class, $this->trainingInstance);
    }

    /** @test */
    public function itShouldReturnGymGoerInstance(): void
    {
        $this->assertEquals($this->gymGoerProphecy, $this->trainingInstance->gymGoer());
    }

    /** @test */
    public function itShouldReturnName(): void
    {
        $this->assertEquals($this->name, $this->trainingInstance->name());
    }

    /** @test */
    public function addExercise(): void
    {
        $exerciseInTraining = $this->trainingInstance->addExercise($this->exerciseProphecy);

        $this->assertInstanceOf(ExerciseInTraining::class, $exerciseInTraining);
    }

    /**
     * @test
     */
    public function listExercises(): void
    {
        $exercisesData = $this->exerciseDataProvider();
        $this->fillExercises($exercisesData);
        $exercisesCollection = $this->trainingInstance->listExercises();

        $this->assertInstanceOf(Collection::class, $exercisesCollection);
        $this->assertCount(3, $exercisesCollection);
        foreach ($exercisesCollection as $key => $exercise) {
            $this->assertInstanceOf(ExerciseInTraining::class, $exercise);
        }
    }

    protected function exerciseDataProvider(): array
    {
        return [
            [$this->getExerciseProphecy()],
            [$this->getExerciseProphecy()],
            [$this->getExerciseProphecy()],
        ];
    }

    private function fillExercises(array $exercisesData): void
    {
        foreach ($exercisesData as $row) {
            $this->trainingInstance->addExercise(...$row);
        }
    }

    private function generateGymGoerProphecy(): void
    {
        $this->gymGoerProphecy = $this->prophesize(GymGoer::class)->reveal();
    }

    private function generateExerciseProphecy(): void
    {
        $this->exerciseProphecy = $this->prophesize(Exercise::class)->reveal();
    }

    private function getExerciseProphecy(): Exercise
    {
        return $this->prophesize(Exercise::class)->reveal();
    }
}
