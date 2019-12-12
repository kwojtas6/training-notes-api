<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciseInTrainingRepository")
 * @ORM\Table(name="training_exercise")
 */
class ExerciseInTraining
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var SeriesValueObject
     *
     * @ORM\Embedded(class="SeriesValueObject", columnPrefix=false)
     */
    protected $series;

    /**
     * @var RepetitionsValueObject
     *
     * @ORM\Embedded(class="App\Entity\RepetitionsValueObject", columnPrefix=false)
     */
    protected $repetitions;

    /**
     * @var Training
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Training", inversedBy="exercises")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotNull()
     */
    protected $training;

    /**
     * @var Exercise
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Exercise")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotNull()
     */
    protected $exercise;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Entry", mappedBy="exerciseInTraining")
     */
    protected $entries;

    public function __construct(Exercise $exercise, Training $training)
    {
        $this->exercise = $exercise;
        $this->training = $training;
    }
}
