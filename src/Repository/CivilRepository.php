<?php

namespace App\Repository;

use App\Entity\Civil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Civil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Civil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Civil[]    findAll()
 * @method Civil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CivilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Civil::class);
    }

    // /**
    //  * @return Civil[] Returns an array of Civil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Civil
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
