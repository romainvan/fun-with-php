<?php

namespace App\Repository;

use App\Entity\Attente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Attente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attente[]    findAll()
 * @method Attente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attente::class);
    }

    // /**
    //  * @return Attente[] Returns an array of Attente objects
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
    public function findOneBySomeField($value): ?Attente
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
