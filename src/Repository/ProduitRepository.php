<?php

namespace App\Repository;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Produit $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Produit $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return Produit[] Returns an array of Produit objects
     */

    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.categorie = :val')
            ->setParameter('val', $value)
           // ->orderBy('c.id', 'ASC')
           // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Produit[] Returns an array of Produit objects
     */

    public function findByGame($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.game = :val')
            ->setParameter('val', $value)
            // ->orderBy('c.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return Produit[] Returns an array of Produit objects
     */

    public function findBySlider($value,$game): array
    {
        return $this->createQueryBuilder('c')
            ->Where('c.game = :gam')
            ->andWhere('c.prixUnitair between 0 and :val')
            ->setParameter('val', $value)
            ->setParameter('gam', $game)
            // ->orderBy('c.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }
    public function findEntitiesByString($str){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e
                FROM AppBundle:Entity e
                WHERE e.nom_produit LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }

/*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('c')
                ->andWhere('c.categorie = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/

}