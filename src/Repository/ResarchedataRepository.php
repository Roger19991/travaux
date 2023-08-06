<?php

namespace App\Repository;

use App\Entity\Resarchedata;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Resarchedata>
 *
 * @method Resarchedata|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resarchedata|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resarchedata[]    findAll()
 * @method Resarchedata[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResarchedataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resarchedata::class);
    }

//    /**
//     * @return Resarchedata[] Returns an array of Resarchedata objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Resarchedata
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
