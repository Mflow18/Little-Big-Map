<?php

namespace App\DataFixtures;

use App\Entity\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture
{
    const PROFESSION = [
        '01' => [
            'name' => 'Agriculteurs exploitants',
        ],
        '02' => [
            'name' => 'Artisans, commerçants, chefs d\'entreprise',
        ],
        '03' => [
            'name' => 'Cadres et professions intellectuelles supérieures',
        ],
        '04' => [
            'name' => 'Professions intermédiaires',
        ],
        '05' => [
            'name' => 'Employés',
        ],
        '06' => [
            'name' => 'Ouvriers',
        ],
        '07' => [
            'name' => 'Autres',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROFESSION as $key => $job) {
            $profession = new Profession();
            $profession->setName($job['name']);
            $manager->persist($profession);
            $this->addReference('profession_'.$key, $profession);
        }
        $manager->flush();
    }
}
