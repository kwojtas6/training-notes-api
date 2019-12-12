<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Training;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TrainingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Training::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('e')
            ->where('e.something = :value')->setParameter('value', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
