<?php

namespace App\Repository;

use App\Entity\Registre2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Registre2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registre2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registre2[]    findAll()
 * @method Registre2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Registre2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registre2::class);
    }

    // /**
    //  * @return Registre2[] Returns an array of Registre2 objects
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
    public function findOneBySomeField($value): ?Registre2
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
