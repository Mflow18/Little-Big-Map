<?php

namespace App\DataFixtures;

use App\Entity\Age;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AgeFixtures extends Fixture
{
    const AGE = [
        '01' => [
            'ageRange' => '00 - 05',
        ],
        '02' => [
            'ageRange' => '06 - 10',
        ],
        '03' => [
            'ageRange' => '11 - 15',
        ],
        '04' => [
            'ageRange' => '16 - 20',
            ],
        '05' => [
            'ageRange' => '21 - 25',
            ],
        '06' => [
            'ageRange' => '26 - 30',
            ],
        '07' => [
            'ageRange' => '31 - 35',
        ],
        '08' => [
            'ageRange' => '36 - 40',
        ],
        '09' => [
            'ageRange' => '41 - 45',
        ],
        '10' => [
            'ageRange' => '46 - 50',
        ],
        '11' => [
            'ageRange' => '51 - 55',
        ],
        '12' => [
            'ageRange' => '56 - 60',
        ],
        '13' => [
            'ageRange' => '61 - 65',
        ],
        '14' => [
            'ageRange' => '66 - 70',
        ],
        '15' => [
            'ageRange' => '71 - 75',
        ],
        '16' => [
            'ageRange' => '76 - 80',
        ],
        '17' => [
            'ageRange' => '81 - 85',
        ],
        '18' => [
            'ageRange' => '86 - 90',
        ],
        '19' => [
            'ageRange' => '91 - 95',
        ],
        '20' => [
            'ageRange' => '96 - 100',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::AGE as $key => $age) {
            $ageRange = new Age();
            $ageRange->setAgeRange($age['ageRange']);
            $manager->persist($ageRange);
            $this->addReference('age_'.$key, $ageRange);
        }
        $manager->flush();
    }
}
