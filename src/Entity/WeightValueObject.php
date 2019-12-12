<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
