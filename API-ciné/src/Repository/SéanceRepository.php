<?php

namespace App\Repository;

use App\Entity\Séance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Séance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Séance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Séance[]    findAll()
 * @method Séance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SéanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Séance::class);
    }

    // /**
    //  * @return Séance[] Returns an array of Séance objects
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
    public function findOneBySomeField($value): ?Séance
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
