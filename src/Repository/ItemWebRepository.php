<?php

namespace App\Repository;

use App\Entity\ItemWeb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ItemWeb|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemWeb|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemWeb[]    findAll()
 * @method ItemWeb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemWebRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemWeb::class);
    }

    // /**
    //  * @return ItemWeb[] Returns an array of ItemWeb objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemWeb
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
