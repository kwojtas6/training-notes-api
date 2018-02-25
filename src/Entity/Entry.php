<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntryRepository")
 */
class Entry
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var ExerciseInTraining
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ExerciseInTraining", inversedBy="entries")
     * @Assert\NotNull()
     */
    protected $exerciseInTraining;

    /**
     * @var WeightValueObject
     *
     * @ORM\Embedded(class="App\Entity\WeightValueObject", columnPrefix=false)
     */
    protected $weight;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;
}
