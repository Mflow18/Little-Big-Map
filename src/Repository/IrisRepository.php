<?php

namespace App\Repository;

use App\Entity\Iris;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Iris|null find($id, $lockMode = null, $lockVersion = null)
 * @method Iris|null findOneBy(array $criteria, array $orderBy = null)
 * @method Iris[]    findAll()
 * @method Iris[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IrisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Iris::class);
    }

    // /**
    //  * @return Iris[] Returns an array of Iris objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Iris
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
