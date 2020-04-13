<?php

namespace App\Repository;

use App\Entity\PersonalEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonalEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalEvent[]    findAll()
 * @method PersonalEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalEvent::class);
    }

    // /**
    //  * @return PersonalEvent[] Returns an array of PersonalEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonalEvent
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
