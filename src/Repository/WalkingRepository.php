<?php

namespace App\Repository;

use App\Entity\Walking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Walking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Walking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Walking[]    findAll()
 * @method Walking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WalkingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Walking::class);
    }

    // /**
    //  * @return Walking[] Returns an array of Walking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Walking
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
