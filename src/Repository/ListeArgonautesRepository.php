<?php

namespace App\Repository;

use App\Entity\ListeArgonautes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeArgonautes>
 *
 * @method ListeArgonautes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeArgonautes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeArgonautes[]    findAll()
 * @method ListeArgonautes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeArgonautesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeArgonautes::class);
    }

    public function add(ListeArgonautes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListeArgonautes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListeArgonautes[] Returns an array of ListeArgonautes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListeArgonautes
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
