<?php

namespace App\Repository;

use App\Entity\TarifaExtra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifaExtra>
 *
 * @method TarifaExtra|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifaExtra|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifaExtra[]    findAll()
 * @method TarifaExtra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifaExtraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifaExtra::class);
    }

    public function add(TarifaExtra $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TarifaExtra $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TarifaExtra[] Returns an array of TarifaExtra objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TarifaExtra
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
