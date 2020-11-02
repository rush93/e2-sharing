<?php

namespace App\Repository;

use App\Entity\ExpressionInclude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExpressionInclude|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpressionInclude|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpressionInclude[]    findAll()
 * @method ExpressionInclude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpressionIncludeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpressionInclude::class);
    }

    // /**
    //  * @return ExpressionInclude[] Returns an array of ExpressionInclude objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpressionInclude
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
