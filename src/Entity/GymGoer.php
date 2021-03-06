<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GymGoer
 * @ORM\Entity()
 */
class GymGoer
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
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Training", mappedBy="gymGoer")
     */
    protected $trainings;

    public function __construct()
    {
        $this->trainings = new ArrayCollection();
    }

    public function createTraining(string $name): Training
    {
        $training = new Training($this, $name);
        $this->trainings->add($training);

        return $training;
    }

    public function listTrainings(): Collection
    {
        return $this->trainings;
    }
}
