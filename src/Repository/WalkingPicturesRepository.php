<?php

namespace App\Repository;

use App\Entity\WalkingPictures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WalkingPictures|null find($id, $lockMode = null, $lockVersion = null)
 * @method WalkingPictures|null findOneBy(array $criteria, array $orderBy = null)
 * @method WalkingPictures[]    findAll()
 * @method WalkingPictures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WalkingPicturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WalkingPictures::class);
    }

    // /**
    //  * @return WalkingPictures[] Returns an array of WalkingPictures objects
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
    public function findOneBySomeField($value): ?WalkingPictures
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
