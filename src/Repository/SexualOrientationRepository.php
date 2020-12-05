<?php

namespace App\Repository;

use App\Entity\SexualOrientation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SexualOrientation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SexualOrientation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SexualOrientation[]    findAll()
 * @method SexualOrientation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SexualOrientationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SexualOrientation::class);
    }

    // /**
    //  * @return SexualOrientation[] Returns an array of SexualOrientation objects
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
    public function findOneBySomeField($value): ?SexualOrientation
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
