<?php

namespace App\DataFixtures;

use App\Entity\Children;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ChildrenFixtures extends Fixture
{
    const CHILDREN = [
        '01' => [
            'number' => 0,
        ],
        '02' => [
            'number' => 1,
        ],
        '03' => [
            'number' => 2,
        ],
        '04' => [
            'number' => 3,
        ],
        '05' => [
            'number' => 4,
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CHILDREN as $key => $number) {
            $child = new Children();
            $child->setNumber($number['number']);
            $manager->persist($child);
        }
        $manager->flush();
    }
}
