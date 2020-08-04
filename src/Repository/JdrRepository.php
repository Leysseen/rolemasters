<?php

namespace App\Repository;

use App\Entity\Jdr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jdr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jdr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jdr[]    findAll()
 * @method Jdr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JdrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jdr::class);
    }

    // /**
    //  * @return Jdr[] Returns an array of Jdr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jdr
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
