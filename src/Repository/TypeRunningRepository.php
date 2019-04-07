<?php

namespace App\Repository;

use App\Entity\TypeRunning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeRunning|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRunning|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRunning[]    findAll()
 * @method TypeRunning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRunningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeRunning::class);
    }

    // /**
    //  * @return TypeRunning[] Returns an array of TypeRunning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeRunning
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
