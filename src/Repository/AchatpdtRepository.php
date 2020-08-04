<?php

namespace App\Repository;

use App\Entity\Achatpdt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Achatpdt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Achatpdt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Achatpdt[]    findAll()
 * @method Achatpdt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatpdtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Achatpdt::class);
    }

    // /**
    //  * @return Achatpdt[] Returns an array of Achatpdt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Achatpdt
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
