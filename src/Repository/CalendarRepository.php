<?php

namespace App\Repository;

use App\Entity\Calendar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Twig\Error\LoaderError;
use Twig\Source;

/**
 * @method Calendar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calendar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calendar[]    findAll()
 * @method Calendar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendarRepository extends ServiceEntityRepository // implements \Twig\Loader\LoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calendar::class);
    }

    // /**
    //  * @return Calendar[] Returns an array of Calendar objects
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
    public function findOneBySomeField($value): ?Calendar
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
//    public function getSourceContext(string $name): Source
//    {
//        // TODO: Implement getSourceContext() method.
//    }
//
//    public function getCacheKey(string $name): string
//    {
//        // TODO: Implement getCacheKey() method.
//    }
//
//    public function isFresh(string $name, int $time): bool
//    {
//        // TODO: Implement isFresh() method.
//    }
//
//    public function exists(string $name)
//    {
//        // TODO: Implement exists() method.
//    }
}
