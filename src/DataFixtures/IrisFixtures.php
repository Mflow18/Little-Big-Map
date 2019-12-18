<?php

namespace App\DataFixtures;

use App\Entity\Iris;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class IrisFixtures extends Fixture
{
    const IRIS = [
        '01' => [
            'name' => 'Beausejour',
        ],
        '02' => [
            'name' => 'Trentemoult',
        ],
        '03' => [
            'name' => 'Bretagne',
        ],
        '04' => [
            'name' => 'Bouffay',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::IRIS as $key => $iris) {
            $iris = new Iris();
            $iris->setName($iris['name']);
            $manager->persist($iris);
        }
        $manager->flush();
    }
}