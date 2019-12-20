<?php

namespace App\Repository;

use App\Entity\UserAddresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserAddresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAddresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAddresses[]    findAll()
 * @method UserAddresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAddressesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAddresses::class);
    }

    // /**
    //  * @return UserAddresses[] Returns an array of UserAddresses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserAddresses
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
