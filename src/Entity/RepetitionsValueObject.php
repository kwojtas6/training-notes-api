<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class RepetitionsValueObject
 * @package App\Entity
 *
 * @ORM\Embeddable()
 */
class RepetitionsValueObject
{
    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     * @Assert\Range(min="1", max="50")
     * @Assert\NotBlank()
     */
    protected $repetitions;
}
