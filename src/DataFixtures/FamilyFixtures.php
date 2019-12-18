<?php

namespace App\DataFixtures;

use App\Entity\Family;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FamilyFixtures extends Fixture
{
    const FAMILY = [
        '01' => [
            'state' => 'Célibataire',
        ],
        '02' => [
            'state' => 'Marié',
        ],
        '03' => [
            'state' => 'En concubinage',
        ],
        '04' => [
            'state' => 'Divorcé',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::FAMILY as $key => $state) {
            $family = new Family();
            $family->setState($state['state']);
            $manager->persist($family);
            $this->addReference('family_'.$key, $family);
        }
        $manager->flush();
    }
}