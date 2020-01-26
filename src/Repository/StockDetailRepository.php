<?php

namespace App\Repository;

use App\Entity\StockDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StockDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockDetail[]    findAll()
 * @method StockDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockDetail::class);
    }

    // /**
    //  * @return StockDetail[] Returns an array of StockDetail objects
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
    public function findOneBySomeField($value): ?StockDetail
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
