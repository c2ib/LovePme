<?php

namespace App\Repository;

use App\Entity\Logechec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Logechec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logechec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logechec[]    findAll()
 * @method Logechec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogechecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logechec::class);
    }

    // /**
    //  * @return Logechec[] Returns an array of Logechec objects
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
    public function findOneBySomeField($value): ?Logechec
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
