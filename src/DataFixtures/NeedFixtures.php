<?php

namespace App\DataFixtures;

use App\Entity\Need;
use App\Entity\Skill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NeedFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Création d’un seul User réutilisé comme auteur
        $author = new User();
        $author->setName($faker->name());
        $manager->persist($author);

        // Création de compétences
        $skillsLabels = ['Symfony', 'API Platform', 'Docker', 'Laravel', 'Vue.js'];
        $skills = [];

        foreach ($skillsLabels as $label) {
            $skill = new Skill();
            $skill->setLabel($label);
            $manager->persist($skill);
            $skills[] = $skill;
        }

        // Création de 10 appels d’offres aléatoires
        for ($i = 0; $i < 10; $i++) {
            $need = new Need();
            $need->setTitle($faker->jobTitle());
            $need->setSummary($faker->sentence(10));
            $need->setUrl($faker->url());
            $need->setAuthor($author);

            // Ajoute entre 1 et 3 compétences
            $randomSkills = $faker->randomElements($skills, rand(1, 3));
            foreach ($randomSkills as $skill) {
                $need->addSkill($skill);
            }

            $manager->persist($need);
        }

        $manager->flush();
    }
}
