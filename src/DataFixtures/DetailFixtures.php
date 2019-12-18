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
            'category' => 'category_01',
        ],
        '02' => [
            'name' => 'Yoga',
            'category' => 'category_01',
        ],
        '03' => [
            'name' => 'Equitation',
            'category' => 'category_01',
        ],
        '04' => [
            'name' => 'Basket',
            'category' => 'category_01',
        ],
        '05' => [
            'name' => 'Omnivore',
            'category' => 'category_02',
        ],
        '06' => [
            'name' => 'Local',
            'category' => 'category_02',
        ],
        '07' => [
            'name' => 'Flexitarien',
            'category' => 'category_02',
        ],
        '08' => [
            'name' => 'Vegan',
            'category' => 'category_02',
        ],
        '09' => [
            'name' => 'Cinema',
            'category' => 'category_03',
        ],
        '10' => [
            'name' => 'Concert',
            'category' => 'category_03',
        ],
        '11' => [
            'name' => 'Brasserie',
            'category' => 'category_03',
        ],
        '12' => [
            'name' => 'Expo',
            'category' => 'category_03',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DETAIL as $key => $det) {
            $detail = new Detail();
            $detail->setName($det['name']);
            $detail->setCategory($this->getReference($det['category']));
            $manager->persist($detail);
            $this->addReference('detail_'.$key, $detail);

        }
        $manager->flush();
    }
}


