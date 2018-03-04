<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Training
 * @package App\Entity
 * @ORM\Entity()
 */
class Training
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="50")
     */
    protected $name;

    /**
     * @var GymGoer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\GymGoer", inversedBy="trainings")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotNull()
     */
    protected $gymGoer;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity=App\Entity\ExerciseInTraining", mappedBy="training")
     */
    protected $exercises;

    public function __construct(GymGoer $gymGoer, string $name)
    {
        $this->exercises = new ArrayCollection();

        $this->gymGoer = $gymGoer;
        $this->name = $name;
    }

    public function gymGoer(): GymGoer
    {
        return $this->gymGoer;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function addExercise(Exercise $exercise): ExerciseInTraining
    {
        $exerciseInTraining = new ExerciseInTraining($exercise, $this);

        $this->exercises->add($exerciseInTraining);

        return $exerciseInTraining;
    }

    public function listExercises(): Collection
    {
        return $this->exercises;
    }
}
