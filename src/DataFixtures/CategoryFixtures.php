<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORY = [
        '01' => [
            'name' => 'Sport',
        ],
        '02' => [
            'name' => 'Alimentation',
        ],
        '03' => [
            'name' => 'Sortie',
        ],
        '04' => [
            'name' => 'Santé',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORY as $key => $cat) {
            $category = new Category();
            $category->setName($cat['name']);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
