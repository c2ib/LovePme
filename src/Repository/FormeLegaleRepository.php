<?php

namespace App\Repository;

use App\Entity\FormeLegale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormeLegale|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormeLegale|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormeLegale[]    findAll()
 * @method FormeLegale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormeLegaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormeLegale::class);
    }

    // /**
    //  * @return FormeLegale[] Returns an array of FormeLegale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormeLegale
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
