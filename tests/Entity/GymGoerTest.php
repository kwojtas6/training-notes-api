<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\GymGoer;
use App\Entity\Training;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class GymGoerTest extends TestCase
{
    /** @var GymGoer */
    private $gymGoerInstance;

    public function setUp()
    {
        $this->gymGoerInstance = new GymGoer();
    }

    /** @test */
    public function itIsInstantiable(): void
    {
        $this->assertInstanceOf(GymGoer::class, $this->gymGoerInstance);
    }

    /** @test */
    public function createTraining(): void
    {
        $trainingName = 'Training name';

        $trainingInstance = $this->gymGoerInstance->createTraining($trainingName);

        $this->assertInstanceOf(Training::class, $trainingInstance);
        $this->assertEquals($this->gymGoerInstance, $trainingInstance->gymGoer());
        $this->assertEquals($trainingName, $trainingInstance->name());
    }

    /**
     * @test
     */
    public function listTrainings(): void
    {
        $trainingData = $this->trainingDataProvider();
        $this->fillTrainings($trainingData);
        $trainingsCollection = $this->gymGoerInstance->listTrainings();

        $this->assertInstanceOf(Collection::class, $trainingsCollection);
        $this->assertCount(3, $trainingsCollection);
        foreach ($trainingsCollection as $key => $training) {
            $this->assertInstanceOf(Training::class, $training);
            $this->assertEquals($trainingData[$key][0], $training->name());
        }
    }

    protected function trainingDataProvider(): array
    {
        return [
            ['Training 1'],
            ['Training 2'],
            ['Training 3'],
        ];
    }

    private function fillTrainings(array $trainingData): void
    {
        foreach ($trainingData as $row) {
            $this->gymGoerInstance->createTraining(...$row);
        }
    }
}
