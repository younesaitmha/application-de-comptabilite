<?php

namespace App\Repository;

use App\Entity\Ventepdt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ventepdt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ventepdt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ventepdt[]    findAll()
 * @method Ventepdt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VentepdtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ventepdt::class);
    }

    // /**
    //  * @return Ventepdt[] Returns an array of Ventepdt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ventepdt
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
