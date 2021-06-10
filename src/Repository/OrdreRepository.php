<?php

namespace App\Repository;

use App\Entity\Ordre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordre[]    findAll()
 * @method Ordre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordre::class);
    }
    /**
     * Returns all Annonces per page
     * @return void 
     */
    public function getPaginatedAnnonces($page, $limit, $filters = null){
        $query = $this->createQueryBuilder('a')
            ->where('a.active = 1');

        // On filtre les données
        if($filters != null){
            $query->andWhere('a.categories IN(:cats)')
                ->setParameter(':cats', array_values($filters));
        }

        $query->orderBy('a.created_at')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit)
        ;
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Ordre[] Returns an array of Ordre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}