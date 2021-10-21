<?php

namespace App\Repository;

use App\Entity\Employé;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Employé|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employé|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employé[]    findAll()
 * @method Employé[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployéRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employé::class);
    }

    // /**
    //  * @return Employé[] Returns an array of Employé objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Employé
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
