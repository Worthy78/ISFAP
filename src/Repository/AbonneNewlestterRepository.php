<?php

namespace App\Repository;

use App\Entity\AbonneNewlestter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AbonneNewlestter|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbonneNewlestter|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbonneNewlestter[]    findAll()
 * @method AbonneNewlestter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbonneNewlestterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AbonneNewlestter::class);
    }

    // /**
    //  * @return AbonneNewlestter[] Returns an array of AbonneNewlestter objects
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
    public function findOneBySomeField($value): ?AbonneNewlestter
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
