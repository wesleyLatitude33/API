<?php

namespace App\Repository;

use App\Entity\OrdemServicoExame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrdemServicoExame|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdemServicoExame|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdemServicoExame[]    findAll()
 * @method OrdemServicoExame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdemServicoExameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdemServicoExame::class);
    }

    // /**
    //  * @return OrdemServicoExame[] Returns an array of OrdemServicoExame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrdemServicoExame
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
