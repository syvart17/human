<?php

namespace App\Repository;

use App\Entity\Need;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Need>
 */
class NeedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Need::class);
    }

    // Exemple : recherche de Needs avec une Skill spécifique
    public function findBySkill(string $skillLabel): array
    {
        return $this->createQueryBuilder('n')
            ->join('n.skills', 's')
            ->where('s.label = :label')
            ->setParameter('label', $skillLabel)
            ->getQuery()
            ->getResult();
    }

    // Exemple : recherche de Needs par auteur
    public function findByAuthor(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.author = :id')
            ->setParameter('id', $userId)
            ->getQuery()
            ->getResult();
    }
}
