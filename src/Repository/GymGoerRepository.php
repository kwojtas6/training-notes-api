<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Entry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GymGoerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entry::class);
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
