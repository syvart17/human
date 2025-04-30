<?php

namespace App\Repository;

use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Skill>
 */
class SkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    // Exemple : recherche de Skill par libellé
    public function findOneByLabel(string $label): ?Skill
    {
        return $this->createQueryBuilder('s')
            ->where('s.label = :label')
            ->setParameter('label', $label)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
