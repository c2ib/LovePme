<?php

namespace App\Repository;

use App\Entity\Registre3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Registre3|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registre3|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registre3[]    findAll()
 * @method Registre3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Registre3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registre3::class);
    }

    // /**
    //  * @return Registre3[] Returns an array of Registre3 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Registre3
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
