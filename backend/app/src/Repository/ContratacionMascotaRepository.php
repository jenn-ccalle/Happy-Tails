<?php

namespace App\Repository;

use App\Entity\ContratacionMascota;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContratacionMascota>
 *
 * @method ContratacionMascota|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratacionMascota|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratacionMascota[]    findAll()
 * @method ContratacionMascota[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratacionMascotaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContratacionMascota::class);
    }

    public function add(ContratacionMascota $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContratacionMascota $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ContratacionMascota[] Returns an array of ContratacionMascota objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContratacionMascota
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
