<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\GymGoer")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotNull()
     */
    protected $gymGoer;
}
