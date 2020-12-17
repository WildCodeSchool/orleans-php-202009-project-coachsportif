<?php

namespace App\Repository;

use App\Entity\FitnessPictures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FitnessPictures|null find($id, $lockMode = null, $lockVersion = null)
 * @method FitnessPictures|null findOneBy(array $criteria, array $orderBy = null)
 * @method FitnessPictures[]    findAll()
 * @method FitnessPictures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FitnessPicturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FitnessPictures::class);
    }

    // /**
    //  * @return FitnessPictures[] Returns an array of FitnessPictures objects
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
    public function findOneBySomeField($value): ?FitnessPictures
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
