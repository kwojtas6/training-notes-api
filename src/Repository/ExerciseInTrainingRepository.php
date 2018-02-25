<?php

namespace App\Repository;

use App\Entity\ExerciseInTraining;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExerciseInTraining|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExerciseInTraining|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExerciseInTraining[]    findAll()
 * @method ExerciseInTraining[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExerciseInTrainingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExerciseInTraining::class);
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
