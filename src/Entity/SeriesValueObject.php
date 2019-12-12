<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Series
 * @package App\Entity
 *
 * @ORM\Embeddable()
 */
class SeriesValueObject
{
    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     * @Assert\Range(min="1", max="15")
     * @Assert\NotBlank()
     */
    protected $series;
}
