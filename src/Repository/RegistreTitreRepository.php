<?php

namespace App\Repository;

use App\Entity\RegistreTitre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegistreTitre|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistreTitre|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistreTitre[]    findAll()
 * @method RegistreTitre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistreTitreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistreTitre::class);
    }

    // /**
    //  * @return RegistreTitre[] Returns an array of RegistreTitre objects
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
    public function findOneBySomeField($value): ?RegistreTitre
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
