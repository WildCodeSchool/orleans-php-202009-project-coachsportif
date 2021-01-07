<?php

namespace App\Repository;

use App\Entity\SportAdapte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SportAdapte|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportAdapte|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportAdapte[]    findAll()
 * @method SportAdapte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportAdapteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SportAdapte::class);
    }

    // /**
    //  * @return SportAdapte[] Returns an array of SportAdapte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SportAdapte
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
