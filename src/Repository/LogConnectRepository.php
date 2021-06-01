<?php

namespace App\Repository;

use App\Entity\LogConnect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogConnect|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogConnect|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogConnect[]    findAll()
 * @method LogConnect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogConnectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogConnect::class);
    }

    // /**
    //  * @return LogConnect[] Returns an array of LogConnect objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LogConnect
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
