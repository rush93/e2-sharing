<?php

namespace App\Repository;

use App\Entity\Expression;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * @method Expression|null find($id, $lockMode = null, $lockVersion = null)
 * @method Expression|null findOneBy(array $criteria, array $orderBy = null)
 * @method Expression[]    findAll()
 * @method Expression[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpressionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expression::class);
    }

    public function findAllForUserPaginated(User $user)
    {
        $query = $this->createQueryBuilder('e')
            ->innerJoin('e.includes' , 'i')
            ->addSelect('i')
            ->where('e.user = :user')
            ->setParameter('user', $user)
        ;
        $adapter = new DoctrineORMAdapter($query);
        return new Pagerfanta($adapter);
    }
}
