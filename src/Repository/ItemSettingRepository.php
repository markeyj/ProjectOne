<?php

namespace App\Repository;

use App\Entity\ItemSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ItemSetting|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemSetting|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemSetting[]    findAll()
 * @method ItemSetting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemSetting::class);
    }

    // /**
    //  * @return ItemSetting[] Returns an array of ItemSetting objects
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
    public function findOneBySomeField($value): ?ItemSetting
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
