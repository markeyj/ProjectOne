<?php

namespace App\Repository;

use App\Entity\StockLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StockLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockLocation[]    findAll()
 * @method StockLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockLocation::class);
    }

    // /**
    //  * @return StockLocation[] Returns an array of StockLocation objects
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
    public function findOneBySomeField($value): ?StockLocation
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
