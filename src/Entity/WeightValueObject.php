<?php

namespace App\Entity;

/**
 * Class WeightValueObject
 * @package App\Entity
 * @ORM\Embeddable()
 */
class WeightValueObject
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\Range(min="500", max="250000")
     * @Assert\NotBlank()
     */
    protected $weight;
}
