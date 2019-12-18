<?php

namespace App\DataFixtures;

use App\Entity\Detail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DetailFixtures extends Fixture
{
    const DETAIL = [
        '01' => [
            'name' => 'Danse',
        ],
        '02' => [
            'name' => 'Yoga',
        ],
        '03' => [
            'name' => 'Equitation',
        ],
        '04' => [
            'name' => 'Basket',
        ],
        '05' => [
            'name' => 'Omnivore',
        ],
        '06' => [
            'name' => 'Local',
        ],
        '07' => [
            'name' => 'Flexitarien',
        ],
        '08' => [
            'name' => 'Vegan',
        ],
        '09' => [
            'name' => 'Cinema',
        ],
        '10' => [
            'name' => 'Concert',
        ],
        '11' => [
            'name' => 'Brasserie',
        ],
        '12' => [
            'name' => 'Expo',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DETAIL as $key => $det) {
            $detail = new Detail();
            $detail->setName($det['name']);
            $manager->persist($detail);
        }
        $manager->flush();
    }
}


