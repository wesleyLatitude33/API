<?php

namespace App\Repository;

use App\Entity\PostoColeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostoColeta|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostoColeta|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostoColeta[]    findAll()
 * @method PostoColeta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostoColetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostoColeta::class);
    }

    // /**
    //  * @return PostoColeta[] Returns an array of PostoColeta objects
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
    public function findOneBySomeField($value): ?PostoColeta
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
