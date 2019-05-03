<?php

namespace App\Repository;

use App\Entity\NewsletterAbo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NewsletterAbo|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsletterAbo|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsletterAbo[]    findAll()
 * @method NewsletterAbo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsletterAboRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NewsletterAbo::class);
    }

    // /**
    //  * @return NewsletterAbo[] Returns an array of NewsletterAbo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewsletterAbo
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
